<?php 
namespace Core;
use \PDO;

class Model 
{
    protected $db = null;

    public function __construct(PDO $db=null)
    {
      $this->dbConnect();
    }

    //function execute retournee
    protected function dbConnect()
    {
        if ($this->db === null) {
            $this->db = new \PDO(
                'mysql:host='.Config::get()->db('host').';'
                .'dbname='.Config::get()->db('dbname').';'
                .'charset='.Config::get()->db('charset'),
                Config::get()->db('username'),
                Config::get()->db('password')
                //.'array('.[\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION].')'
            );
        }
        return $this->db;
    }

    /*protected function dbConnect()
    {
        if ($this->db === null) {
            $this->db = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }

        return $this->db;
    }

    public function update()
    {
        try {
            $this->dbconnect();
            $model = (new \ReflectionClass($this))->getShortName();
            $sql = "INSERT INTO {$table} ({$args}) WHERE id = ?";
            $request = $this->db->prepare($sql);
            $request->execute(array());
        } catch (\Exception $ex){
            echo 'Impossible ç ';
        }
        return true;
    }

    public function delete($id)
    {
        try {
            $this->dbconnect();
            $model = (new \ReflectionClass($this))->getShortName();
            $sql = "DELETE FROM {$table} WHERE id = ?";
            $request = $this->db->prepare($sql);
            $request->execute(array($id));
        } catch (\Exception $ex){
            return false;
        }
        return true;
    }*/
}