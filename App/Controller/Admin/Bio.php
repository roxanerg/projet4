<?php
    namespace App\Controller\Admin;
    use Core\Controller;
    use App\Model;

class Bio extends \Core\Controller
{
    /**
     * @fn	public function edit($id, $post)
     *
     * @brief	Edits
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @param	id  	The identifier.
     * @param	post	The post.
     *
     * @returns	A function.
     */

    public function edit($id, $post)
    {
        $bioModel = new \App\Model\Bio();
        if (!empty($post)) 
        {
            $edit_bio = $bioModel->update($id, $post['biography']);
        }
        $bio = $bioModel->get(1);
        $this->view->displayAdmin('biography', ['biography' => $bio]);
    }

} 
