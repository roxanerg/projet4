<?php

require_once('../Core/Model.php');

class PostModel extends Model
{

    /**
     * 
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
            $episodesList[$key]['contenu'] =  substr($episodes['contenu'], 0, $space) . '...';
        }
        $request->closeCursor();
        return $episodesList;
    }
    
    public function count()
    {
        return $this->db->query('SELECT COUNT(*) FROM episodes')->fetchColumn();
    }

    public function get($id)
    {
        $request = $this->db->prepare('SELECT id, titre, contenu, date_creation, date_modif FROM episodes WHERE id = :id');
        $request->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $request->execute();
        $episodes = $request->fetchAll();
        
        return $episodes[0];
    }
    
    function add($titre, $contenu, $date_creation)
    {
        $request = $this->db->prepare('INSERT INTO episodes (id, titre, contenu, date_creation, date_modif) VALUES(NULL, :titre, :contenu, :date_creation, NOW())');
        $request->bindParam(':titre', $titre, PDO::PARAM_STR);
        $request->bindParam(':contenu', $contenu, PDO::PARAM_STR);
        $request->bindParam(':date_creation', $date_creation, PDO::PARAM_STR);
        $add_post = $request->execute();
        return $add_post;
    }

    function delete($id)
    {
        $this->db->exec('DELETE FROM episodes WHERE id = '.(int) $id);
    }

    function update($id, $titre, $contenu)
    {
        $request = $this->db->prepare('UPDATE episodes SET titre = :titre, contenu = :contenu, date_modif = NOW() WHERE id = :id');
        $request->bindValue(':titre', $titre, PDO::PARAM_STR);
        $request->bindValue(':contenu', $contenu, PDO::PARAM_STR);
        $request->bindValue(':id', $id, PDO::PARAM_INT);
        $request->execute();
    }
}
