<?php
    namespace App\Controller\Admin;
    use Core\Controller;
    use App\Model;

class Comments extends \Core\Controller
{
    /**
     * @fn	public function view()
     *
     * @brief	Gets the view
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @returns	A function.
     */

    public function view()
    {
        $commentModel = new \App\Model\Comments();
        $comments = $commentModel->all();
        $this->view->displayAdmin('comments', ['comments' => $comments]);
    }

    /**
     * @fn	public function delete($commentId=0)
     *
     * @brief	Deletes the given comment
     *
     * @author	A
     * @date	25/03/2019
     *
     * @param	optional $commentId	The optional $comment Identifier to delete.
     *
     * @returns	A function.
     */

    public function delete($commentId=0)
    {
        $commentModel = new \App\Model\Comments();
        $deleted = $commentModel->delete($commentId);
    }
} 

