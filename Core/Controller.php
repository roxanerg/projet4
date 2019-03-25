<?php
namespace Core;

require('View.php');

class Controller extends View
{
    public $view;

    /**
     * @fn	public function __construct()
     *
     * @brief	Gets the view
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @returns	A function.
     */

    public function __construct() 
    {
        $this->view = new View();
    }

}
