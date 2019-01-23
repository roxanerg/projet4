<?php

namespace App\Controller;

class CommentController 
{
    function addComment($postId, $author, $comment)
    {
        $addComm = postComment($postId, $author, $comment);

        if ($addComm === false) {
            die('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }
} 