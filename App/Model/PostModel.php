<?php


require_once('../Core/Model.php');

class PostModel extends Model
{
  

    /**
     * 
     */
    public function getList($debut = 0, $limite = 5, $textmax = 500)
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

    public function getEpisode($id)

    {
        $request = $this->db->prepare('SELECT id, titre, contenu, date_creation, date_modif FROM episodes WHERE id = :id');
        $request->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $request->execute();
        $episodes = $request->fetchAll();
        
        return $episodes[0];
    }
    
    protected function add(Episodes $episodes)

    {
        $request = $this->db->prepare('INSERT INTO episodes(titre, contenu, date_creation, date_modif) VALUES(:titre, :contenu, NOW(), NOW())');
        $request->bindValue(':titre', $episodes->titre());
        $request->bindValue(':contenu', $episodes->contenu());
        $request->execute();
    }

    public function count()
    {
        return $this->db->query('SELECT COUNT(*) FROM episodes')->fetchColumn();
    }

    public function delete($id)
    {
        $this->db->exec('DELETE FROM episodes WHERE id = '.(int) $id);
    }

    protected function update(Episodes $episodes)

    {
        $request = $this->db->prepare('UPDATE episodes SET titre = :titre, contenu = :contenu, date_modif = NOW() WHERE id = :id');
        $request->bindValue(':titre', $episodes->titre());
        $request->bindValue(':contenu', $episodes->contenu());
        $request->bindValue(':id', $episodes->id(), PDO::PARAM_INT);
        $request->execute();
    }
}
