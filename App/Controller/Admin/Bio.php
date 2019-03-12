<?php
    namespace App\Controller\Admin;
    use Core\Controller;
    use App\Model;

class Bio extends \Core\Controller
{
    function edit()
    {
        $bioModel = new \App\Model\Bio();
        $biography = $bioModel->edit();   
        $this->view->displayAdmin('biography', ['biography' => $biography]);
    }

    function add($contenu)
    {
        $bioModel = new \App\Model\Bio();
        $biography = $bioModel->add();
    }
} 