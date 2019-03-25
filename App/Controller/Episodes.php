<?php
    namespace App\Controller;
    use Core\Controller;
    use App\Model;


class Episodes extends \Core\Controller
{   
    /**
     * @fn	public function view($episode_id=0)
     *
     * @brief	Views the episode
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @param	optional $episode_id	Identifier for the optional $episode.
     *
     * @returns	A function.
     */

    public function view($episode_id=0)  
    {
        $episodeModel = new \App\Model\Episodes();
        $episode = $episodeModel->get($episode_id);
        $commentModel = new \App\Model\Comments();
        $comments = $commentModel->get($episode_id);
		$previousId = $episodeModel->getPrevious($episode_id);
		if (empty($previousId)) {
			$previousId = $episodeModel->getFirstId();
		}
		$nextId = $episodeModel->getNext($episode_id);
		if (empty($nextId)) {
			$nextId = $episodeModel->getLastId();
		}
        $this->view->display('episode', ['episode' => $episode, 'comments' => $comments, 'previous' => $previousId, 'next' => $nextId]);
    }

}

