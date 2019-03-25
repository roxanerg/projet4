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

        case 'episode' : $controller = new App\Controller\Episodes();
            $controller->view($_GET['id']);
            break;

        case 'biographie' : $controller = new App\Controller\Bio();
            $controller->view();
            break;
        
        case 'comment' : $controller = new App\Controller\Comments();
            $controller->add($_POST);
            $controller = new App\Controller\Episodes();
            $controller->view($_POST['episodeId']);
            break;

        case 'reportComment' : $controller = new App\Controller\Comments();
        $controller->report($_GET);
        break;

        // backend
        case 'login' : 
            $controller = new App\Controller\Admin\LogAdmin();
            $controller->login($_POST, 'indexAdmin');
			if (isset($_SESSION['connected']) && $_SESSION['connected']) {
				header('Location: indexAdmin');
			}
            
            break;

        case 'indexAdmin' : 
			if (!$_SESSION['connected']) {
				header('Location: login');
			} else {
				$controller = new App\Controller\Admin\Admin();
				$controller->index();
			}
            break;
        
        case 'logoutAdmin' : unset($_SESSION['connected']);
			header('Location: /index.php');
            break;
            
        case 'allEpisodes' : $controller = new App\Controller\Admin\Episodes();
            $controller->viewAll();
            break;
            
        case 'editEpisode' : $controller = new App\Controller\Admin\Episodes();
            $controller->edit($_POST);
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

		case 'unreportComment' : $controller = new App\Controller\Admin\Admin();
            $controller->unreport($_POST);
			$controller->index();
            break;
        
        case 'deleteComment' : $controller = new App\Controller\Admin\Comments();
            $controller->delete($_GET['id']);
			$action = explode('=', $_SERVER['HTTP_REFERER']);

			if ($action[1]=='allComments') {
				header('Location: /?action=allComments');
			} else {
				header('Location: /indexAdmin');
			}
			break;

        case 'editBio' : $controller = new App\Controller\Admin\Bio();
            $controller->edit(1, $_POST);
			
		print_r($_POST); exit;
            break;

        case 'allUsers' : $controller = new App\Controller\Admin\Users();
            $controller->viewAll();
            break;
			
		case 'editUser' : $controller = new App\Controller\Admin\Users();
            $controller->edit($_GET['id'], $_POST);
            break;

        case 'addUser' : $controller = new App\Controller\Admin\Users();
            $controller->add($_POST);
			$controller->viewAll();
            break;

        case 'deleteUser' : $controller = new App\Controller\Admin\Users();
            $controller->delete($_GET['id']);
            $controller->viewAll();
            break;

        default : $controller = new App\Controller\App();
            $controller->index(); 
    }
