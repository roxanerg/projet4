<?php

class View 
{
    public function display($file) {
        $content = file_get_contents('../App/View/'.$file.'.php');
        echo $content;
    }
}