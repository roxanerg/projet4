<?php
    namespace App\Controller;
    use Core\Controller;
    use App\Model;


class Comments extends \Core\Controller
{
    /**
     * @fn	function add($post)
     *
     * @brief	Adds a comment
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @param	post	The post to add.
     *
     * @returns	.
     */

    function add($post)
    {
        $commentModel = new \App\Model\Comments();
        $addComm = $commentModel->add($post['episodeId'], $post['auteur'], $post['commentaire']);
    }

    /**
     * @fn	function report($get)
     *
     * @brief	Reports the given comment
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @param	get	The get.
     *
     * @returns	.
     */

    function report($get) 
    {
        $commentModel = new \App\Model\Comments();
        $reportComm = $commentModel->report($get['id']);
    }
	
} 