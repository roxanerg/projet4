<?php

require_once('../App/Controller/AppController.php');
//require_once('../App/Controller/PostController.php');
//require_once('../App/Controller/CommentController.php');

$action_get = '';

    if (isset($_GET['action'])) 
    {
        $action_get = $_GET['action'];
    }

    $action = explode('/', $action_get);
    
    switch ($action[0]) {
        case 'allPosts' : allPosts();
            break;
        
        case 'post' : $controller = new postController();
            $controller->index($action[1]);
            break;

        case 'addComment' : $controller = new commentController();
            $controller->add();
            break;

        case 'chapterView' : $controller = new AppController();
            $controller->chapterview($_GET['id']);
            break;

        default : $controller = new AppController();
            $controller->index();
    }
