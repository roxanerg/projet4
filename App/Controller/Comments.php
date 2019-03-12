<?php
    namespace App\Controller;
    use Core\Controller;
    use App\Model;


class Comments extends \Core\Controller
{
    function add($post)
    {
        $commentModel = new \App\Model\Comments();
        $addComm = $commentModel->post($post['episodeId'], $post['auteur'], $post['commentaire']);
    }

    function report($get) 
    {
        $commentModel = new \App\Model\Comments();
        $reportComm = $commentModel->report($get['id']);
    }
} 