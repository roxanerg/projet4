<?php


class CommentModel extends Model
{
    
    function getComments($episodeId) 
    {  
        $this->dbConnect();
        $request = $this->db->prepare('SELECT pseudo, commentaire, DATE_FORMAT(date_commentaire, "%d/%m/%Y %Hh%imin%ss") AS jour_comm FROM commentaires WHERE id_episode = ? ORDER BY date_commentaire DESC');
        $request->execute(array($episodeId));
        $comments = $request->fetchAll();
        return $comments;
    }

    function postComment() 
    {
        $this->dbConnect($postId, $auteur, $commentaire);
        if (isset($_POST['auteur']) && isset($_POST['commentaire']))
        {
            $request = $db->prepare('INSERT INTO commentaires (id_episode, pseudo, commentaire, date_commentaire) VALUES (?, ?, ?, NOW())');
            $addComm = $request->execute(array($postId, $auteur, $commentaire));
            return $addComm;       
        }
    }
    public function addComment($postId, $author, $comment)
    {
        $this->dbConnect();
        $addComm = postComment($postId, $author, $comment);
        $request= $this->db->prepare('SELECT id, titre, episode, DATE_FORMAT(date_creation, "%d/%m/%Y") AS jour FROM episodes WHERE id = ?');
        $request->execute(array($postId));
        $chapter = $request->fetch();
        if ($addComm === false) {
            die('Impossible d\'ajouter le commentaire !');
        }
        else 
        {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }
}