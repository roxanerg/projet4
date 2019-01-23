<?php

require('../App/Controller/AppController.php');
require('../App/Controller/PostController.php');
require('../App/Controller/CommentController.php');

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

        default : $controller = new AppController();
        $controller->index();
    }
