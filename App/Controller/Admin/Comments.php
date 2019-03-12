<?php
    namespace App\Controller\Admin;
    use Core\Controller;
    use App\Model;

class Comments extends \Core\Controller
{

    function view()
    {
        $commentModel = new \App\Model\Comments();
        $comments = $commentModel->all();
        $this->view->displayAdmin('comments', ['comments' => $comments]);
    }
    
    function delete($commentId=0)
    {
        $commentModel = new \App\Model\Comments();
        $deleted = $commentModel->delete($commentId);
    }
} 

