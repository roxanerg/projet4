<?php

require_once('../Core/Model.php');

class LoginModel extends Model
{
    
    function login($login, $password) 
    {  
        $this->dbConnect();
        $request = $this->db->prepare('SELECT id, name_admin FROM log_admin WHERE email_admin = ? AND password_admin = AES_ENCRYPT(?, UNHEX(SHA2(\'jforteroche\',512)))');
        $request->execute(array($login, $password));
        $connected = $request->rowCount();
        return $connected;     
    }
}
