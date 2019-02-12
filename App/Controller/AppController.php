<?php

require_once ('../Core/Controller.php');
require_once ('../App/Model/PostModel.php');
require_once ('../App/Model/CommentModel.php');

class AppController extends Controller 
{
    
    public function index()
    {
        $results_per_page = 5;
        if(isset($_GET['page'])) {
            $page = $_GET['page'];
        }else{
            $page=1;
        }
        $postModel = new PostModel();
        $episodes = $postModel->getList(($page-1) * $results_per_page, $results_per_page*$page);
        $count = $postModel->count();
        $pages = ceil($count / $results_per_page); 
        //$vars = array('count'=> $count, 'episodes' => $episodes);
        $this->view->display('index', ['pages' => $pages, 'episodes' => $episodes]);
       
    }

}