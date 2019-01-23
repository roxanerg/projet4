<?php

require ('../Core/Controller.php');

class AppController extends Controller 
{
    public function  index()
    {
        $this->view->display('index');
    }
}