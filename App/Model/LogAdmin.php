<?php
namespace App\Model;
use Core;

class LogAdmin extends \Core\Model
{
    
    public function login($login, $password) 
    {  
        $user = new Users;
        return $user->checkLogin($login, $password);
    }
}
