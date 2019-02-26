<?php
    namespace App\Controller;
    use Core\Controller;
    use App\Model\Bio;


class BioController extends Controller
{
    function view()
    {
        $bioModel = new Bio();
        $bio = $bioModel->get();
        $this->view->display('biography', ['biography']);
    }
}    
