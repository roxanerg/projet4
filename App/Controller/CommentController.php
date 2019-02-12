<?php

require_once('../App/Model/CommentModel.php');


class CommentController 
{
    function add($post)
    {
        $commentModel = new CommentModel();
        $addComm = $commentModel->postComment($post['episodeId'], $post['auteur'], $post['commentaire']);
    }

    function report($get) 
    {
        $commentModel = new CommentModel();
        $reportComm = $commentModel->reportAbuse($get['id']);
    }
} 