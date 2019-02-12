<?php

class View 
{
    public function display($file, $vars) {
        ob_start();
        include_once('../App/View/header.php');
        include_once('../App/View/'.$file.'.php');
        include_once('../App/View/footer.php');
        ob_end_flush();
    }
}