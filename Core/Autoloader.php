<?php
spl_autoload_register('Autoloader::CoreLoader');

class Autoloader 
{  
    /**
     * @fn	static function CoreLoader($className)
     *
     * @brief	Loads the given class
     *
     * @author	A
     * @date	25/03/2019
     *
     * @param	className	Name of the class.
     *
     * @returns	A function.
     */

    static function CoreLoader($className) 
    {
        $path = '../';
        $className = preg_replace('#\\\#', '/', $className);
        include $path.$className.'.php';

    }

}