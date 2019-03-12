<?php 
namespace Core;

class Model 
{
    protected $db = null;

    public function __construct(PDO $db=null)
    {
      $this->dbConnect();
    }

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
