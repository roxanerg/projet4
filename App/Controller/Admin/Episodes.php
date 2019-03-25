<?php
    namespace App\Controller\Admin;
    use Core\Controller;
    use App\Model;

class Episodes extends \Core\Controller
{   
    /**
     * @fn	public function viewAll()
     *
     * @brief	View all episodes
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @returns	A function.
     */

    public function viewAll()
    {
        $postModel = new \App\Model\Episodes();
        $episodes = $postModel->list(0, 50, 300);
        $this->view->displayAdmin('episodes', ['episodes' => $episodes]);
    }

    /**
     * @fn	public function edit($post)
     *
     * @brief	Edits the given episode
     *
     * @author	A
     * @date	25/03/2019
     *
     * @param	post	The episode
     *
     * @returns	A function.
     */

    public function edit($post)  
    {      
        $postModel = new \App\Model\Episodes();
        if (!empty($post)) 
        {
            $edit_post = $postModel->update($post['id'], $post['titre'], $post['contenu']);
        }
        $episode = $postModel->get($_GET['id']);
        $this->view->displayAdmin('episode', ['episode' => $episode]);
     }

    /**
     * @fn	public function add($post)
     *
     * @brief	Adds the episode
     *
     * @author	A
     * @date	25/03/2019
     *
     * @param	post	The episode 
     *
     * @returns	A function.
     */

    public function add($post)
    {
        $postModel = new \App\Model\Episodes();
        $add_post = $postModel->add($post['titre'], $post['contenu'], $post['date_creation']);
        return $add_post;
    }

    /**
     * @fn	public function delete($id=0)
     *
     * @brief	Deletes the given episode
     *
     * @author	A
     * @date	25/03/2019
     *
     * @param	optional $id	The episode $id to delete.
     *
     * @returns	A function.
     */

    public function delete($id=0)
    {
        $postModel = new \App\Model\Episodes();
        $deleted = $postModel->delete($id);
    }
  
}
