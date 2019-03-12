<?php
    namespace App\Controller\Admin;
    use Core\Controller;
    use App\Model;

class Admin extends \Core\Controller 
{
    public function index()
    {
        $commentModel = new \App\Model\Comments();
        $moderateComm = $commentModel->abuse();
        $this->view->displayAdmin('index', ['moderateComm' => $moderateComm]);
    }
}
