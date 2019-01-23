<?php

namespace Core;

abstract class View 
{
    public function display($file) {
        $content = file_get_contents('../view/'.$file.'.php');
        echo $content;
    }
}