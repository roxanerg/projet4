<?php
    namespace App\Model;
    use Core;

class Users extends \Core\Model
{
    /**
     * @fn	public function list()
     *
     * @brief	Gets users list
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @returns	A function.
     */

    public function list()
    {
        $sql = 'SELECT * FROM log_admin'; 
        $request = $this->db->query($sql);
        $usersList = $request->fetchAll();
        return $usersList;
    }

    /**
     * @fn	public function get($id)
     *
     * @brief	Gets user using the given identifier
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @param	id	The user's Identifier to get.
     *
     * @returns	A function.
     */

    public function get($id)
    {
        $request = $this->db->prepare('SELECT * FROM log_admin WHERE id = :id');
        $request->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $request->execute();
        $user = $request->fetchAll();
        
        return $user[0];
    }

    /**
     * @fn	public function checkLogin($login, $password)
     *
     * @brief	Checks the login infos
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @param	login   	The login.
     * @param	password	The password.
     *
     * @returns	A function.
     */

    public function checkLogin($login, $password)
    {
        $request = $this->db->prepare('SELECT * FROM log_admin WHERE email_admin = ?');
        $request->execute(array($login));
        $result = $request->fetch();
        if (password_verify($password, $result['password_admin'])) {
            return true;
        } else {
			return false;
		}
    }

    /**
     * @fn	function add($mail, $password, $name)
     *
     * @brief	Adds an user
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @param	mail		The user's mail.
     * @param	password	The user's password.
     * @param	name		The user's name.
     *
     * @returns	.
     */

    function add($mail, $password, $name)
    {
        $password = password_hash($password, PASSWORD_DEFAULT, [ 'cost' => 12]);
        $request = $this->db->prepare('INSERT INTO log_admin (email_admin, password_admin, name_admin) VALUES(:mail_admin, :password_admin, :name_admin)');
        $request->bindParam(':mail_admin', $mail, \PDO::PARAM_STR);
        $request->bindParam(':password_admin', $password, \PDO::PARAM_STR);
        $request->bindParam(':name_admin', $name, \PDO::PARAM_STR);
		$add_user = $request->execute();
        return $add_user;
    }

    /**
     * @fn	function update($id, $name, $mail)
     *
     * @brief	Updates this object
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @param	id  	The user's identifier.
     * @param	name	The user's name.
     * @param	mail	The user's mail.
     *
     * @returns	.
     */

    function update($id, $name, $mail)
    {
        $request = $this->db->prepare('UPDATE log_admin SET email_admin = :mail_admin, name_admin = :name_admin WHERE id = :id');
		$request->bindValue(':mail_admin', $mail, \PDO::PARAM_STR);
        $request->bindValue(':name_admin', $name, \PDO::PARAM_STR);
        $request->bindValue(':id', $id, \PDO::PARAM_INT);
        $request->execute();
		//print_r($request->errorInfo());
    }

	/**
	 * @fn	function update_passw($id, $password)
	 *
	 * @brief	Updates user's password
	 *
	 * @author	Roxane Riff
	 * @date	25/03/2019
	 *
	 * @param	id			The user's identifier.
	 * @param	password	The user's password.
	 *
	 * @returns	.
	 */

	function update_passw($id, $password)
    {
		$password = password_hash($password, PASSWORD_DEFAULT, [ 'cost' => 12]);
        $request = $this->db->prepare('UPDATE log_admin SET password_admin = :password_admin WHERE id = :id');
		$request->bindValue(':password_admin', $password, \PDO::PARAM_STR);
        $request->bindValue(':id', $id, \PDO::PARAM_INT);
        $request->execute();
		
    }

    /**
     * @fn	function delete($id)
     *
     * @brief	Deletes the user
     *
     * @author	A
     * @date	25/03/2019
     *
     * @param	id	The user's Identifier to delete.
     *
     * @returns	.
     */

    function delete($id)
    {
        $this->db->exec('DELETE FROM log_admin WHERE id = '.(int) $id);
    }
}
