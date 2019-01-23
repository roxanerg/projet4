<?php

require('../controller/mainController.php');
require('../controller/postController.php');

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

        case 'addComment' : addComment();
            break;

        default : $controller = new mainController();
        $controller->index();
    }
