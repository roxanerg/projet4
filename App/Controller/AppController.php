<?php

require_once ('../Core/Controller.php');
require_once ('../App/Model/PostModel.php');
require_once ('../App/Model/CommentModel.php');

class AppController extends Controller 
{
    
    public function index()
    {
        $postModel = new PostModel();
        $episodes = $postModel->getList(0, 5);
        
        $this->view->display('index', ['episodes' => $episodes]);
       
    }
    public function chapterView($episode_id=0)  
    {
        $postModel = new PostModel();
        $episodes = $postModel->getEpisode($episode_id);
        $commentModel = new CommentModel();
        $comments = $commentModel->getComments($episode_id);
        $this->view->display('chapterView', ['episodes' => $episodes, 'comments' => $comments]);
    }


}