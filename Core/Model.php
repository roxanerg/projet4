<?php 
namespace Core;

class Model 
{
    protected $db = null;

    /**
     * @fn	public function __construct(PDO $db=null)
     *
     * @brief	Constructs the given database
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @param	db	(Optional) The database.
     *
     * @returns	A function.
     */

    public function __construct(PDO $db=null)
    {
      $this->dbConnect();
    }

    /**
     * @fn	protected function dbConnect()
     *
     * @brief	Database connect
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @returns	A function.
     */

    protected function dbConnect()
    {
        if ($this->db === null) {
            $this->db = new \PDO(
                'mysql:host='.Config::get()->db('host').';'
                .'dbname='.Config::get()->db('dbname').';',
                Config::get()->db('username'),
                Config::get()->db('password')
            );
        }

        return $this->db;
    }

}
