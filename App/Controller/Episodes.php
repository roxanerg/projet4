<?php
    namespace App\Controller;
    use Core\Controller;
    use App\Model;


class Episodes extends \Core\Controller
{   
    public function view($episode_id=0)  
    {
        $episodeModel = new \App\Model\Episodes();
        $episode = $episodeModel->get($episode_id);
        $commentModel = new \App\Model\Comments();
        $comments = $commentModel->get($episode_id);
        $this->view->display('episodeView', ['episode' => $episode, 'comments' => $comments]);
    }

}

