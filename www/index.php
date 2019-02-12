<?php

session_start();

require_once('../App/Controller/AppController.php');
require_once('../App/Controller/PostController.php');
require_once('../App/Controller/CommentController.php');
require_once('../App/Controller/Admin/AdminController.php');
require_once('../App/Controller/Admin/LoginController.php');

$action_get = '';

    if (isset($_GET['action'])) 
    {
        $action_get = $_GET['action'];
    }

    $action = explode('/', $action_get);
    
    switch ($action[0]) {

        case 'chapterView' : $controller = new PostController();
            $controller->view($_GET['id']);
            break;

        case 'addComment' : $controller = new CommentController();
            $controller->add($_POST);
            $controller = new PostController();
            $controller->view($_POST['episodeId']);
            break;

        case 'reportComment' : $controller = new CommentController();
        $controller->report($_GET);
        break;

        case 'loginAdmin' : if (isset($_SESSION['connected']) && $_SESSION['connected']) {
            header('Location: /tests/projet4/index.php?action=indexAdmin');
        }
                $controller = new LoginController();
                $controller->login($_POST, 'indexAdmin');
            

           /* }*/
            break;
        case 'indexAdmin' : if (!$_SESSION['connected']) {
            header('Location: /tests/projet4/index.php?action=loginAdmin');
        }
        $controller = new AdminController();
        $controller->view();
                break;
        
        case 'logoutAdmin' : unset($_SESSION['connected']);
        header('Location: /tests/projet4/index.php');
            break;

        default : $controller = new AppController();
            $controller->index();
    }
