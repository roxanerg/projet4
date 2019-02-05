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
        //$this->view->display('index');
    }

    public function chapterView($episode_id=0) {
       //    $this->view->display('chapterView');
    }

}
