<?php

session_start();

require_once('../App/Controller/AppController.php');
require_once('../App/Controller/PostController.php');
require_once('../App/Controller/CommentController.php');
require_once('../App/Controller/Admin/AdminController.php');
require_once('../App/Controller/Admin/LoginController.php');
require_once('../App/Controller/Admin/Episodes.php');
require_once('../App/Controller/Admin/Comments.php');
require_once('../App/Controller/BioController.php');
require_once('../App/Controller/Admin/Bio.php');


$action_get = '';

    if (isset($_GET['action'])) 
    {
        $action_get = $_GET['action'];
    }

    $action = explode('/', $action_get);
    
    switch ($action[0]) {

        case 'episodeView' : $controller = new PostController();
            $controller->view($_GET['id']);
            break;

        case 'getBio' : $controller = new BioController();
            $controller->view();
            break;
        
        case 'addComment' : $controller = new CommentController();
            $controller->add($_POST);
            $controller = new PostController();
            $controller->view($_POST['episodeId']);
            break;

        case 'reportComment' : $controller = new CommentController();
        $controller->report($_GET);
        break;

        // backend
        case 'loginAdmin' : if (isset($_SESSION['connected']) && $_SESSION['connected']) {
            header('Location: /tests/projet4/index.php?action=indexAdmin');
        }
                $controller = new LoginController();
                $controller->login($_POST, 'indexAdmin');
            
            break;
        case 'indexAdmin' : if (!$_SESSION['connected']) {
            header('Location: /tests/projet4/index.php?action=loginAdmin');
        }
        $controller = new AdminController();
        $controller->index();
                break;
        
        case 'logoutAdmin' : unset($_SESSION['connected']);
        header('Location: /tests/projet4/index.php');
            break;
            
        case 'allEpisodes' : $controller = new Episodes();
            $controller->viewAll();
            break;
            
        case 'editEpisode' : $controller = new Episodes();
            $controller->edit($_GET['id'], $_POST);
            break;

        case 'addEpisode' : $controller = new Episodes();
            $controller->add($_POST);
            break;

        case 'deleteEpisode' : $controller = new Episodes();
            $controller->delete($_GET['id']);
            $controller->viewAll();
            break;

        case 'allComments' : $controller = new Comments();
            $controller->view();
            break;
        
        case 'deleteComment' : $controller = new Comments();
            $controller->delete($_GET['commentId']);
            $controller->view();
            break;

        case 'editBio' : $controller = new Bio();
            $controller->edit();
            break;

        case 'addBio' : $controller = new Bio();
            $controller->add($_POST);
            break;

        default : $controller = new AppController();
            $controller->index();
    }
