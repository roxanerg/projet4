<?php
    namespace App\Controller;
    use Core\Controller;
    use App\Model\Comments;


class CommentsController extends Controller
{
    function add($post)
    {
        $commentModel = new Comments();
        $addComm = $commentModel->post($post['episodeId'], $post['auteur'], $post['commentaire']);
    }

    function report($get) 
    {
        $commentModel = new Comments();
        $reportComm = $commentModel->report($get['id']);
    }
} 