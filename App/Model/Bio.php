<?php
    namespace App\Model;
    use Core;

class Bio extends \Core\Model
{
    public function get()
    {
        $request = $this->db->prepare('SELECT contenu FROM biographie');
        $request->execute(array());
        $biography = $request->fetchAll();
        return $biography;
    }

    function add($contenu)
    {
        $request = $this->db->prepare('INSERT INTO biographie (contenu) VALUE(:contenu');
        $request->bindParam(':contenu', $contenu, \PDO::PARAM_STR);
        $biography = $request->execute();
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