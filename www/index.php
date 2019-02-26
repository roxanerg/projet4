<?php
use App\Controller;
require_once('../Core/Autoloader.php');
session_start();

Core\Config::get();

$action_get = '';

/*
    if (isset($_GET['action'])) 
    {
        $action_get = $_GET['action'];
    } 
    else 
    {
        http_response_code(404);
       // include('../App/View/404.php');
        exit;
    }
*/
    $action = explode('/', $action_get);
    
    switch ($action[0]) {

        case 'episodeView' : $controller = new EpisodesController();
            $controller->view($_GET['id']);
            break;

        case 'getBio' : $controller = new BioController();
            $controller->view();
            break;
        
        case 'addComment' : $controller = new CommentController();
            $controller->add($_POST);
            $controller = new EpisodesController();
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
            
        case 'allEpisodes' : $controller = new AdEpisodes();
            $controller->viewAll();
            break;
            
        case 'editEpisode' : $controller = new AdEpisodes();
            $controller->edit($_GET['id'], $_POST);
            break;

        case 'addEpisode' : $controller = new AdEpisodes();
            $controller->add($_POST);
            break;

        case 'deleteEpisode' : $controller = new AdEpisodes();
            $controller->delete($_GET['id']);
            $controller->viewAll();
            break;

        case 'allComments' : $controller = new AdComments();
            $controller->view();
            break;
        
        case 'deleteComment' : $controller = new AdComments();
            $controller->delete($_GET['commentId']);
            $controller->view();
            break;

        case 'editBio' : $controller = new AdBio();
            $controller->edit();
            break;

        case 'addBio' : $controller = new AdBio();
            $controller->add($_POST);
            break;

        default : 
if(empty())            $controller = new App\Controller\AppController();
            $controller->index();
    }
