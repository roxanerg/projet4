<?php

namespace Core;

require('../view/View.php');

abstract class Controller 
{
    private $view;

    public function __construct(View $view) 
    {
        $this->view = $view;
    }

    public function index() {
        $this->view->display('index');
    }

}
