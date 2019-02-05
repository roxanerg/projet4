<?php 

abstract class Model 
{
    protected $db = null;

    public function __construct(PDO $db=null)
    {
      $this->dbConnect();
    }

    protected function dbConnect()
    {
        if ($this->db === null) {
            $this->db = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }

        return $this->db;
    }

    // + créer squelette pour chaque requête à la db ?

}