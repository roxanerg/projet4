<?php
    namespace App\Controller;
    use Core\Controller;
    use App\Model\Episodes;
    use App\Model\Comments;

//require_once('../Core/Controller.php');

class EpisodesController extends Controller
{
    // private episode private comments private episode_id
    
    public function view($episode_id=0)  
    {
        $postModel = new Episodes();
        $episode = $postModel->get($episode_id);
        $commentModel = new Comments();
        $comments = $commentModel->get($episode_id);
        $this->view->display('episodeView', ['episode' => $episode, 'comments' => $comments]);
    }

}
