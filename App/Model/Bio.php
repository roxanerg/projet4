<?php
    namespace App\Model;
    use Core;

class Bio extends \Core\Model
{
    /**
     * @fn	public function get()
     *
     * @brief	Gets the bio
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @returns	A function.
     */

    public function get()
    {
        $request = $this->db->prepare('SELECT * FROM biographie WHERE id= 1');
        $request->execute(array());
        $biography = $request->fetch(\PDO::FETCH_ASSOC);
        return $biography;
    }

    /**
     * @fn	function update($id, $contenu)
     *
     * @brief	Updates this object
     *
     * @author	A
     * @date	25/03/2019
     *
     * @param	id	   	The identifier.
     * @param	contenu	The content.
     *
     * @returns	.
     */

    function update($id, $contenu)
    {
        $request = $this->db->prepare('UPDATE biographie SET contenu = :contenu WHERE id= 1');
        $request->bindValue(':contenu', $contenu, \PDO::PARAM_STR);
        $request->execute();
    }

}