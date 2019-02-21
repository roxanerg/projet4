<?php

require_once ('../Core/Controller.php');
require_once ('../App/Model/CommentModel.php');

class AdminController extends Controller 
{
    public function index()
    {
        $commentModel = new CommentModel();
        $moderateComm = $commentModel->abuse();
        $this->view->displayAdmin('index', ['moderateComm' => $moderateComm]);
    }
}
