<?php
    namespace App\Controller\Admin;
    use Core\Controller;
    use App\Model;

class LogAdmin extends \Core\Controller
{
    /**
     * @fn	function login($post, $redirect)
     *
     * @brief	Login
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @param	post		The post.
     * @param	redirect	The redirect.
     *
     * @returns	.
     */

    function login($post, $redirect) {

      $message = [];
      if (isset($post['login']) && isset($post['password']))
      {
        $login = $post['login'];
        $password = $post['password'];
        $loginModel = new \App\Model\LogAdmin();
        $connected = $loginModel->login($login, $password);
        if (!$connected) {
          $_SESSION['connected'] = false;
          $message['error'] = 'Mot de passe incorrect';
        } else {
          $_SESSION['connected'] = true;
          header('Location: index.php?action='.$redirect);
        }
      }

      $this->view->display('Admin/login', $message);
    } 
}
