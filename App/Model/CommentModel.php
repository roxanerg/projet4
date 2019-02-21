<?php

require_once('../Core/Model.php');

class CommentModel extends Model
{

    function get($episodeId) 
    {  
        $request = $this->db->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, "%d/%m/%Y %Hh%imin%ss") AS jour_comm FROM commentaires WHERE id_episode = ? ORDER BY date_commentaire DESC');
        $request->execute(array($episodeId));
        $comments = $request->fetchAll();
        return $comments;
    }

    public function post($episodeId, $auteur, $commentaire) 
    {
        if (isset($_POST['auteur']) && isset($_POST['commentaire']))
        {
            $request = $this->db->prepare('INSERT INTO commentaires (id_episode, auteur, commentaire, date_commentaire) VALUES (?, ?, ?, NOW())');
            $addComm = $request->execute(array($episodeId, $auteur, $commentaire));
            return $addComm;       
        }
    }

    public function report($id)
    {
        $request= $this->db->prepare('UPDATE commentaires SET abuse = 1 WHERE id = ?');
        $reportComm = $request->execute(array($id));
        return $reportComm;
    }
    
    function abuse()
    {
        return $moderateComm=$this->db->query('SELECT id, auteur, commentaire FROM commentaires WHERE abuse = 1')->fetchAll();
    }

    function all()
    {
        return $comments=$this->db->query('SELECT * FROM commentaires')->fetchAll();
    }

    function delete($commentId)
    {
        $this->db->exec('DELETE FROM commentaires WHERE id = '.(int) $commentId);
    }

}