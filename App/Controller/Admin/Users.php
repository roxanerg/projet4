<?php
    namespace App\Controller\Admin;
    use Core\Controller;
    use App\Model;

class Users extends \Core\Controller
{  
    function viewAll()
    {
        $usersModel = new \App\Model\Users();
        $users = $usersModel->list();
        $this->view->displayAdmin('users', ['users' => $users]);
    }

    function add($post)
    {
        $userModel = new \App\Model\Users();
        $add_user = $userModel->add($post['name'], $post['mail'], $post['password']);
        return $add_user;
    }

    function delete($id=0)
    {
        $userModel = new \App\Model\Users();
        $deleted = $userModel->delete($id);
    }

}
