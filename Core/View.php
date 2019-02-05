<?php

class View 
{
    public function display($file, $vars) {
        ob_start();
        include_once('../App/View/'.$file.'.php');
        ob_end_flush();
    }
}