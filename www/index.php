<?php
    use App\Controller;
    use App\Controller\Admin;
    use Core;
    require_once('../Core/Autoloader.php');
    
    session_start();
        
    $action_get = '';

    if (isset($_GET['action'])) 
    {
        $action_get = $_GET['action'];
    }
    
    Core\Config::get();

    $action = explode('/', $action_get);
    
    switch ($action[0]) {

        case 'episodeView' : $controller = new App\Controller\Episodes();
            $controller->view($_GET['id']);
            break;

        case 'getBio' : $controller = new App\Controller\Bio();
            $controller->view();
            break;
        
        case 'addComment' : $controller = new App\Controller\Comments();
            $controller->add($_POST);
            $controller = new App\Controller\Episodes();
            $controller->view($_POST['episodeId']);
            break;

        case 'reportComment' : $controller = new App\Controller\Comments();
        $controller->report($_GET);
        break;

        // backend
        case 'loginAdmin' : if (isset($_SESSION['connected']) && $_SESSION['connected']) {
            header('Location: /index.php?action=indexAdmin');
        }
                $controller = new App\Controller\Admin\LogAdmin();
                $controller->login($_POST, 'indexAdmin');
            
            break;
        case 'indexAdmin' : if (!$_SESSION['connected']) {
            header('Location: /index.php?action=loginAdmin');
        }
        $controller = new App\Controller\Admin\Admin();
        $controller->index();
                break;
        
        case 'logoutAdmin' : unset($_SESSION['connected']);
        header('Location: /index.php');
            break;
            
        case 'allEpisodes' : $controller = new App\Controller\Admin\Episodes();
            $controller->viewAll();
            break;
            
        case 'editEpisode' : $controller = new App\Controller\Admin\Episodes();
            $controller->edit($_GET['id'], $_POST);
            break;

        case 'addEpisode' : $controller = new App\Controller\Admin\Episodes();
            $controller->add($_POST);
            $controller->viewAll();
            break;

        case 'deleteEpisode' : $controller = new App\Controller\Admin\Episodes();
            $controller->delete($_GET['id']);
            $controller->viewAll();
            break;

        case 'allComments' : $controller = new App\Controller\Admin\Comments();
            $controller->view();
            break;
        
        case 'deleteComment' : $controller = new App\Controller\Admin\Comments();
            $controller->delete($_GET['commentId']);
            $controller->view();
            break;

        case 'editBio' : $controller = new App\Controller\Admin\Bio();
            $controller->edit();
            break;

        case 'addBio' : $controller = new App\Controller\Admin\Bio();
            $controller->add($_POST);
            break;

        case 'allUsers' : $controller = new App\Controller\Admin\Users();
            $controller->viewAll();
            break;

        case 'addUser' : $controller = new App\Controller\Admin\Users();
            $controller->add($_POST);
            break;

        case 'deleteUser' : $controller = new App\Controller\Admin\Users();
            $controller->delete($_GET['id']);
            $controller->viewAll();
            break;

        default : $controller = new App\Controller\App();
            $controller->index(); 
    }
