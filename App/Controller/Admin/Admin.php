<?php
    namespace App\Controller\Admin;
    use Core\Controller;
    use App\Model;

class Admin extends \Core\Controller 
{
    /**
     * @fn	public function index()
     *
     * @brief	Gets the index
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @returns	A function.
     */

    public function index()
    {
        $commentModel = new \App\Model\Comments();
        $moderateComm = $commentModel->moderate();
        $this->view->displayAdmin('index', ['moderateComm' => $moderateComm]);
    }

	/**
	 * @fn	public function unreport($get)
	 *
	 * @brief	Unreports the given comment
	 *
	 * @author	A
	 * @date	25/03/2019
	 *
	 * @param	get	The get.
	 *
	 * @returns	A function.
	 */

	public function unreport($get)
	{
        $commentModel = new \App\Model\Comments();
        $unreportComm = $commentModel->unreport($get['id']);
	}
	
}
