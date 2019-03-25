<?php
    namespace App\Controller\Admin;
    use Core\Controller;
    use App\Model;

class Users extends \Core\Controller
{  
    /**
     * @fn	public function viewAll()
     *
     * @brief	View all users
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @returns	A function.
     */

    public function viewAll()
    {
        $usersModel = new \App\Model\Users();
        $users = $usersModel->list();
        $this->view->displayAdmin('users', ['users' => $users]);
    }

    /**
     * @fn	public function add($post)
     *
     * @brief	Adds user
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @param	post	The user infos to add.
     *
     * @returns	A function.
     */

    public function add($post)
    {
        $userModel = new \App\Model\Users();
        $add_user = $userModel->add($post['mail'], $post['password'], $post['name']);
        return $add_user;
    }

	/**
	 * @fn	public function edit($id=0, $post)
	 *
	 * @brief	Edits the user
	 *
	 * @author	Roxane Riff
	 * @date	25/03/2019
	 *
	 * @param	optional $id	The optional user $id.
	 * @param	post			The user infos.
	 *
	 * @returns	A function.
	 */

	public function edit($id=0, $post)  
    {      
        $userModel = new \App\Model\Users();
        if (!empty($post)) {
            $userModel->update($id, $post['name'], $post['mail']);
        }
		if (!empty($post['password'])) {
			$userModel->update_passw($id, $post['password']);
		} 
        $user = $userModel->get($id);
        $this->view->displayAdmin('user', ['user' => $user]);
     }

    /**
     * @fn	public function delete($id=0)
     *
     * @brief	Deletes the given user
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @param	optional $id	The given user $id to delete.
     *
     * @returns	A function.
     */

    public function delete($id=0)
    {
        $userModel = new \App\Model\Users();
        $deleted = $userModel->delete($id);
    }

}
