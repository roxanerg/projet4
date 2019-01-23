<?php

namespace App\Controller;

use \Core\Controller;

require('../model/PostModel.php');

class PostController 
{
    protected $postModel;

    public function __construct(Postmodel $postModel)
    {
        $this->postModel = $postModel;
    }
    
    public function Index($post) 
    {
        $post_array = explode('-', $post);
        $post_object = $postModel->findById($post_array[0]);
        print_r($post_object); 
    }

    public function allPosts() {
        $chapters = getPosts();
        require('chaptersView.php');
    }

    
}
