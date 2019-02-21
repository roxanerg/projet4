<?php

require_once('../Core/Controller.php');
require_once('../App/Model/CommentModel.php');

class Comments extends Controller
{

    function view()
    {
        $commentModel = new CommentModel();
        $comments = $commentModel->all();
        $this->view->displayAdmin('comments', ['comments' => $comments]);
    }
    
    function delete($commentId=0)
    {
        $commentModel = new CommentModel();
        $deleted = $commentModel->delete($commentId);
    }
} 

