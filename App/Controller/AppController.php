<?php

require_once ('../Core/Controller.php');
require_once ('../App/Model/PostModel.php');

class AppController extends Controller 
{
    
    public function index()
    {
        $postModel = new PostModel();
        $episodes = $postModel->getList(0, 5);
        
        $this->view->display('index', ['episodes' => $episodes]);
       
    }


}