<?php
    namespace App\Controller;
    use Core\Controller;
    use App\Model;


class Bio extends \Core\Controller
{
    function view()
    {
        $bioModel = new \App\Model\Bio();
        $bio = $bioModel->get();
        $this->view->display('biography', ['biography']);
    }
}    
