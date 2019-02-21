<?php

require_once ('../Core/Controller.php');
require_once ('../App/Model/PostModel.php');
require_once ('../App/Model/CommentModel.php');

class AppController extends Controller 
{
    
    public function index()
    {
        $postModel = new PostModel();
        $count = $postModel->count();
        
        $results_per_page = 5;
        $pages = ceil($count / $results_per_page); 
        
        if(!isset($_GET['page']) || ($_GET['page'] < 1) || ($_GET['page'] > $pages)) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        
        $episodes = $postModel->list(($page-1) * $results_per_page, $results_per_page*$page);
        
        $this->view->display('index', ['page' => $page, 'pages' => $pages, 'episodes' => $episodes]);       
    }

}