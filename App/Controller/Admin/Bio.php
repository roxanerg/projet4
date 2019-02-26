<?php
    namespace App\Controller\Admin;
    use \Core\Controller;
    use App\Model\Bio;

require_once('../App/Model/Bio.php');

class AdBio extends Controller
{
    function edit()
    {
        $bioModel = new BioModel();
        $biography = $bioModel->edit();   
        $this->view->displayAdmin('biography', ['biography' => $biography]);
    }

    function add($post)
    {
        $bioModel = new BioModel();
        $biography = $bioModel->add();
    }
} 