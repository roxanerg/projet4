<?php

require_once('../Core/Controller.php');
require_once('../App/Model/PostModel.php');
require_once('../App/Model/CommentModel.php');

class PostController extends Controller
{
    
    public function view($episode_id=0)  
    {
        $postModel = new PostModel();
        $episodes = $postModel->getEpisode($episode_id);
        $commentModel = new CommentModel();
        $comments = $commentModel->getComments($episode_id);
        $this->view->display('chapterView', ['episodes' => $episodes, 'comments' => $comments]);
    }

    /* exemple sauvegarde
    public function save(Episodes $episodes)
    {
        if ($episodes->isValid()) {
            $episodes->isNew() ? $this->add($episodes) : $this->update($episodes);
        }
        else {
            throw new RuntimeException('La news doit être valide pour être enregistrée');
        }
    }*/
}
