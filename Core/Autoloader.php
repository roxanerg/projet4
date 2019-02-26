<?php

spl_autoload_register('Autoloader::CoreLoader');
//spl_autoload_register('Autoloader::AppLoader');

class Autoloader 
{
    

    static function CoreLoader($className) 
    {
        $path = '../';
        $className = preg_replace('#\\\#', '/', $className);
        include $path.$className.'.php';

    }

    
    /*static function AppLoader($className) 
    {
        $path = '../App';
        include $path.$className.'.php';

    }*/

}