<?php

class View 
{
    public function display($file, $vars) {
        //echo '<pre>';print_r($vars);exit;
        ob_start();
        //include('Template.php');
        include_once('../App/View/'.$file.'.php');
        ob_end_flush();
    }
}