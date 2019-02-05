<?php

namespace App\Controller;

use \Core\Controller;

require('../App/Model/CommentModel.php');


abstractclass CommentController 
{
    function add($postId, $author, $comment)
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