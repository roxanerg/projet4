<?php

namespace Model;

use \Core\Model;

require('App/Model.php');

class CommentModel extends Model
{
    
    function getComments($postId) 
    {  
        $this->dbConnect();
        $comments = $db->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, "%d/%m/%Y %Hh%imin%ss") AS jour_comm FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire DESC');
        $comments->execute(array($postId));
        return $comments;
    }

    function postComment() 
    {
        $this->dbConnect($postId, $auteur, $commentaire);
        if (isset($_POST['auteur']) && isset($_POST['commentaire']))
        {
            $request = $db->prepare('INSERT INTO commentaires (id_billet, auteur, commentaire, date_commentaire) VALUES (?, ?, ?, NOW())');
            $addComm = $request->execute(array($postId, $auteur, $commentaire));
            return $addComm;       
        }
    }
    public function addComment($postId, $author, $comment)
    {
        $this->dbConnect();
        $addComm = postComment($postId, $author, $comment);
        $request= $this->db->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, "%d/%m/%Y") AS jour FROM billets WHERE id = ?');
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