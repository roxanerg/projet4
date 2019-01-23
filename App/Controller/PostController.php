<?php

namespace App\Controller;

use \Core\Controller;

interface interfacePost 
{
    public function Index($post);
}

require('../App/Model/PostModel.php');


class PostController implements interfacePost
{
    protected $postModel;

    /**
     * __construct
     *
     * @param  mixed $postModel
     *
     * @return void
     */
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

    public function allEpisodes() {
        $chapters = getChapters(0, 5);
        foreach($chapters as $key => $chapter)
        {
            $chapters[$key]['titre'] = htmlspecialchars($chapter['titre']);
            $chapters[$key]['jour'] =  htmlspecialchars($chapter['jour']);
            $chapters[$key]['contenu'] = nl2br(htmlspecialchars($chapter['contenu']));
        }
        require('index.php');
    }

    
}