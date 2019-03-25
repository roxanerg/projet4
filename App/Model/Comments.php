<?php
namespace App\Model;
use Core;

class Comments extends \Core\Model
{
    /**
     * @fn	public function get($episodeId)
     *
     * @brief	Gets the comment using the given episode identifier
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @param	episodeId	The episode Identifier to get.
     *
     * @returns	A function.
     */

    public function get($episodeId) 
    {  
        $request = $this->db->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, "%d/%m/%Y %Hh%imin%ss") FROM commentaires WHERE id_episode = ? ORDER BY date_commentaire DESC');
        $request->execute(array($episodeId));
        $comments = $request->fetchAll();
        return $comments;
    }

    /**
     * @fn	public function add($episodeId, $auteur, $commentaire)
     *
     * @brief	Adds a comment
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @param	episodeId  	Identifier for the linked episode.
     * @param	auteur	   	The author.
     * @param	commentaire	The comment.
     *
     * @returns	A function.
     */

    public function add($episodeId, $auteur, $commentaire) 
    {
        if (isset($_POST['auteur']) && isset($_POST['commentaire']))
        {
            $request = $this->db->prepare('INSERT INTO commentaires (id_episode, auteur, commentaire, date_commentaire) VALUES (?, ?, ?, NOW())');
            $addComm = $request->execute(array($episodeId, $auteur, $commentaire));
            return $addComm;       
        }
    }

    /**
     * @fn	public function report($id)
     *
     * @brief	Reports the given comment
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @param	id	The comment identifier.
     *
     * @returns	A function.
     */

    public function report($id)
    {
        $request= $this->db->prepare('UPDATE commentaires SET abuse = 1 WHERE id = ?');
        $report = $request->execute(array($id));
        return $report;
    }

    /**
     * @fn	public function moderate()
     *
     * @brief	Gets the comments to moderate
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @returns	A function.
     */

    public function moderate()
    {
        $request= $this->db->prepare('SELECT id, auteur, commentaire, date_commentaire FROM commentaires WHERE abuse = 1');
        $request->execute(array());
        $moderate = $request->fetchAll();
        return $moderate;
    }

	/**
	 * @fn	public function unreport($id)
	 *
	 * @brief	Unreports the given comment
	 *
	 * @author	Roxane Riff
	 * @date	25/03/2019
	 *
	 * @param	id	The comment identifier.
	 *
	 * @returns	A function.
	 */

	public function unreport($id)
	{
	echo $id;
		$request= $this->db->prepare('UPDATE commentaires SET abuse = 0 WHERE id = ?');
        $unreport = $request->execute(array($id));
        return $unreport;
	}

    /**
     * @fn	public function all()
     *
     * @brief	Gets all comments
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @returns	A function.
     */

    public function all()
    {
        $request = $this->db->prepare('SELECT * FROM commentaires');
        $request->execute(array());
        $comments = $request->fetchAll();
        return $comments;
    }

    /**
     * @fn	public function delete($commentId)
     *
     * @brief	Deletes the given comment
     *
     * @author	A
     * @date	25/03/2019
     *
     * @param	commentId	The comment Identifier to delete.
     *
     * @returns	A function.
     */

    public function delete($commentId)
    {
        $this->db->exec('DELETE FROM commentaires WHERE id = '.(int) $commentId);
    }

}