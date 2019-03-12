<?php
spl_autoload_register('Autoloader::CoreLoader');

class Autoloader 
{  

    static function CoreLoader($className) 
    {
        $path = '../';
        $className = preg_replace('#\\\#', '/', $className);
        include $path.$className.'.php';

    }

}