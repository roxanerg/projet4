<?php
    namespace App\Controller\Admin;
    use \Core\Controller;
    use App\Model\Comments;

require_once('../App/Model/Comments.php');

class AdComments extends Controller
{

    function view()
    {
        $commentModel = new Comments();
        $comments = $commentModel->all();
        $this->view->displayAdmin('comments', ['comments' => $comments]);
    }
    
    function delete($commentId=0)
    {
        $commentModel = new Comments();
        $deleted = $commentModel->delete($commentId);
    }
} 

