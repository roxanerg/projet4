<?php
namespace App\Model;
use Core;

class LogAdmin extends \Core\Model
{
    /**
     * @fn	public function login($login, $password)
     *
     * @brief	Login checking
     *
     * @author	A
     * @date	25/03/2019
     *
     * @param	login   	The admin login.
     * @param	password	The admin password.
     *
     * @returns	A function.
     */

    public function login($login, $password) 
    {  
        $user = new Users;
        return $user->checkLogin($login, $password);
    }
}
