<?php

require_once('../Core/Controller.php');
require_once('../App/Model/PostModel.php');
require_once('../App/Model/CommentModel.php');

class PostController extends Controller
{
    
    public function view($episode_id=0)  
    {
        $postModel = new PostModel();
        $episode = $postModel->get($episode_id);
        $commentModel = new CommentModel();
        $comments = $commentModel->get($episode_id);
        $this->view->display('episodeView', ['episode' => $episode, 'comments' => $comments]);
    }

}
