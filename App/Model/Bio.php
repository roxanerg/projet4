<?php
    namespace App\Model;
    use Core\Model;

require_once('../Core/Model.php');

class BioModel extends Model
{
    public function get()
    {
        $request = $this->db->prepare('SELECT contenu FROM biographie');
        $request->execute(array());
        $biography = $request->fetchAll();
        return $biography;
    }

    function edit() 
    {
        $request = $this->db->prepare('SELECT contenu FROM biographie');
        $request->execute(array());
        $biography = $request->fetchAll();
        return $biography;
    }

    function update()
    {
        $request = $this->db->prepare('UPDATE biographie SET contenu = :contenu');
        $request->bindValue(':contenu', $contenu, PDO::PARAM_STR);
        $request->execute();
    }

}