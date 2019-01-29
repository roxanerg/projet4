<?php

namespace App\Controller;

use \Core\Controller;

require('../App/Model/PostModel.php');


abstract class PostController
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

    abstract protected function add(Episodes $episodes);
    abstract public function count();
    abstract public function delete($id);
    abstract public function getList($debut = -1, $limite = -1);
    abstract public function getUnique($id);
    
    public function save(Episodes $episodes)
    {
        if ($episodes->isValid()) {
            $episodes->isNew() ? $this->add($episodes) : $this->update($episodes);
        }
        else {
            throw new RuntimeException('La news doit être valide pour être enregistrée');
        }
    }

    abstract protected function update(Episodes $episodes);

    /*public function allEpisodes() {
        $chapters = getChapters(0, 5);
        foreach($chapters as $key => $chapter)
        {
            $chapters[$key]['titre'] = htmlspecialchars($chapter['titre']);
            $chapters[$key]['jour'] =  htmlspecialchars($chapter['jour']);
            $chapters[$key]['contenu'] = nl2br(htmlspecialchars($chapter['contenu']));
        }
        require('index.php');
    }*/  
}
