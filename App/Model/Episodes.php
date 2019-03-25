<?php
    namespace App\Model;
    use Core;

class Episodes extends \Core\Model
{
    /**
     * @fn	public function list($debut = 0, $limite = 5, $textmax = 500)
     *
     * @brief	Lists episodes
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @param	optional $debut  	The optional $debut.
     * @param	optional $limite 	The optional $limite.
     * @param	optional $textmax	The optional $textmax.
     *
     * @returns	A function.
     */

    public function list($debut = 0, $limite = 5, $textmax = 500)
    {
        $sql = 'SELECT id, titre, contenu, date_creation, date_modif FROM episodes ORDER BY id DESC'; 

        $sql .= ' LIMIT '.(int) $limite;
        if ($debut) {
            $sql .= ' OFFSET '.(int) $debut;
        }
       
        $request = $this->db->query($sql);

        $episodesList = $request->fetchAll();

        foreach ($episodesList as $key => $episodes) {
            $space = strpos($episodes['contenu'], ' ', $textmax);
			if ($space != 0) {
				$episodesList[$key]['contenu'] =  substr($episodes['contenu'], 0, $space) . '...';
			}
        }
        $request->closeCursor();
        return $episodesList;
    }

    /**
     * @fn	public function count()
     *
     * @brief	Gets the episodes count
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @returns	A function.
     */

    public function count()
    {
        $request = $this->db->prepare('SELECT COUNT(*) FROM episodes');
        $request->execute(array());
        $count = $request->fetchColumn();
        return $count;
    }

    /**
     * @fn	public function get($id)
     *
     * @brief	Gets an episode using the given identifier
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @param	id	The Identifier to get.
     *
     * @returns	A function.
     */

    public function get($id)
    {
        $request = $this->db->prepare('SELECT id, titre, contenu, date_creation, date_modif FROM episodes WHERE id = :id');
        $request->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $request->execute();
        $episodes = $request->fetchAll();
        
        return $episodes[0];
    }

	/**
	 * @fn	public function getFirstId()
	 *
	 * @brief	Gets the first episode
	 *
	 * @author	Roxane Riff
	 * @date	25/03/2019
	 *
	 * @returns	The first episode identifier.
	 */

	public function getFirstId() 
	{
		$request = $this->db->prepare('SELECT id, titre FROM episodes ORDER BY id ASC LIMIT 1 OFFSET 0');
        $request->execute();
        return $request->fetch(\PDO::FETCH_ASSOC);

	}

	/**
	 * @fn	public function getLastId()
	 *
	 * @brief	Gets the last episode 
	 *
	 * @author	Roxane Riff
	 * @date	25/03/2019
	 *
	 * @returns	The last episode identifier.
	 */

	public function getLastId() 
	{
		$request = $this->db->prepare('SELECT id, titre FROM episodes ORDER BY id DESC LIMIT 1 OFFSET 0');
        $request->execute();
        return $request->fetch(\PDO::FETCH_ASSOC);
	}

	/**
	 * @fn	public function getPrevious($id)
	 *
	 * @brief	Gets the previous item
	 *
	 * @author	Roxane Riff
	 * @date	25/03/2019
	 *
	 * @param	id	The identifier.
	 *
	 * @returns	The previous episode.
	 */

	public function getPrevious($id)
	{
		$request = $this->db->prepare('SELECT id, titre FROM episodes WHERE id = (select max(id) from episodes where id < :id)');
		$request->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $request->execute();
        return $request->fetch(\PDO::FETCH_ASSOC);
	}

	/**
	 * @fn	public function getNext($id)
	 *
	 * @brief	Gets the next item
	 *
	 * @author	Roxane Riff
	 * @date	25/03/2019
	 *
	 * @param	id	The identifier.
	 *
	 * @returns	The next episode.
	 */

	public function getNext($id)
	{
		$request = $this->db->prepare('SELECT id, titre FROM episodes WHERE id = (select min(id) from episodes where id > :id)');
		$request->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $request->execute();
        return $request->fetch(\PDO::FETCH_ASSOC);
	}

    /**
     * @fn	public function add($titre, $contenu, $date_creation)
     *
     * @brief	Adds an episode
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @param	titre		 	The episode title.
     * @param	contenu		 	The episode content.
     * @param	date_creation	The episode creation date.
     *
     * @returns	A function.
     */

    public function add($titre, $contenu, $date_creation)
    {
        $request = $this->db->prepare('INSERT INTO episodes (titre, contenu, date_creation) VALUES(:titre, :contenu, NOW())');
        $request->bindParam(':titre', $titre, \PDO::PARAM_STR);
        $request->bindParam(':contenu', $contenu, \PDO::PARAM_STR);
        $add_post = $request->execute();
        return $add_post;
    }

    /**
     * @fn	public function update($id, $titre, $contenu)
     *
     * @brief	Updates this object
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @param	id	   	The episode identifier.
     * @param	titre  	The episode title.
     * @param	contenu	The episode content.
     *
     * @returns	A function.
     */

    public function update($id, $titre, $contenu)
    {
        $request = $this->db->prepare('UPDATE episodes SET titre = :titre, contenu = :contenu, date_modif = NOW() WHERE id = :id');
        $request->bindValue(':titre', $titre, \PDO::PARAM_STR);
        $request->bindValue(':contenu', $contenu, \PDO::PARAM_STR);
        $request->bindValue(':id', $id, \PDO::PARAM_INT);
        $request->execute();
    }

    /**
     * @fn	public function delete($id)
     *
     * @brief	Deletes the given episode
     *
     * @author	A
     * @date	25/03/2019
     *
     * @param	id	The episode Identifier to delete.
     *
     * @returns	A function.
     */

    public function delete($id)
    {
        $this->db->exec('DELETE FROM episodes WHERE id = '.(int) $id);
    }

}
