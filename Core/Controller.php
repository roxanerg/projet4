<?php

require('View.php');

class Controller extends View
{
    public $view;

    public function __construct() 
    {
        $this->view = new View();
    }

    public function index() {
        $this->view->display('index');
    }

}
