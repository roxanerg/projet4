<?php

require_once('../Core/Controller.php');
require_once('../App/Model/CommentModel.php');


class CommentController extends Controller
{
    function add($post)
    {
        $commentModel = new CommentModel();
        $addComm = $commentModel->post($post['episodeId'], $post['auteur'], $post['commentaire']);
    }

    function report($get) 
    {
        $commentModel = new CommentModel();
        $reportComm = $commentModel->report($get['id']);
    }
} 