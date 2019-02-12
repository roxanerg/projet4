<?php

require_once('../Core/Model.php');

class CommentModel extends Model
{
    
    function getComments($episodeId) 
    {  
        $this->dbConnect();
        $request = $this->db->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, "%d/%m/%Y %Hh%imin%ss") AS jour_comm FROM commentaires WHERE id_episode = ? ORDER BY date_commentaire DESC');
        $request->execute(array($episodeId));
        $comments = $request->fetchAll();
        return $comments;

         /*foreach ($commentsList as $key => $comments): 

        <h4><?=$comments['auteur']?></h4>

        <p><?=$comments['commentaire']?></p>

        <p><em><?=$comments['jour_comm']?></em></p>

        <button class="report" name="<?=$comments['id']?>"><i class="far fa-flag"></i></button>
    
        endforeach;*/
    }

    function postComment($episodeId, $auteur, $commentaire) 
    {
        $this->dbConnect($episodeId, $auteur, $commentaire);
        if (isset($_POST['auteur']) && isset($_POST['commentaire']))
        {
            $request = $this->db->prepare('INSERT INTO commentaires (id_episode, auteur, commentaire, date_commentaire) VALUES (?, ?, ?, NOW())');
            $addComm = $request->execute(array($episodeId, $auteur, $commentaire));
            return $addComm;       
        }
    }
    public function reportAbuse($id)
    {
        $this->dbConnect($id);
        $request= $this->db->prepare('UPDATE commentaires SET abuse = 1 WHERE id = ?');
        $reportComm = $request->execute(array($id));
        return $reportComm;
    }
}