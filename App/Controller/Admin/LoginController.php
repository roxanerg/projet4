<?php

require_once('../App/Model/LoginModel.php');

class LoginController extends Controller
{
    function login($post, $redirect) {

      $message = [];
      if (isset($post['login']) && isset($post['password']))
      {
        $login = $post['login'];
        $password = $post['password'];
        $loginModel = new LoginModel();
        $connected = $loginModel->login($login, $password);
        if (!$connected) {
          $_SESSION['connected'] = false;
          $message['error'] = 'Mdp incorrect';
        } else {
          $_SESSION['connected'] = true;
          header('Location: /tests/projet4/index.php?action='.$redirect);
        }
      }

      $this->view->display('Admin/login', $message);
    } 
}
