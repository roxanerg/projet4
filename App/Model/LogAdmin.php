<?php
namespace App\Model;
use Core;

class LogAdmin extends \Core\Model
{
    
    function login($login, $password) 
    {  
        $this->dbConnect();
        $request = $this->db->prepare('SELECT id FROM log_admin WHERE email_admin = ? AND password_admin = ?');
        $request->execute(array($login, $password));
        $connected = $request->rowCount();
        return $connected;
    }
}
