<?php
    namespace App\Controller\Admin;
    use \Core\Controller;
    use App\Model\Comments;

//require_once('../App/Model/Comments.php');

class AdminController extends Controller 
{
    public function index()
    {
        $commentModel = new Comments();
        $moderateComm = $commentModel->abuse();
        $this->view->displayAdmin('index', ['moderateComm' => $moderateComm]);
    }
}
