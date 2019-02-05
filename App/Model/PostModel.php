<?php


require('../Core/Model.php');

class PostModel extends Model
{
    public function findById($postId) // construct ?
    {
        $this->dbConnect();
        $request= $this->db->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, "%d/%m/%Y") AS jour FROM episodes WHERE id = ?');
        $request->execute(array($postId));
        $chapter = $request->fetch();
        return $chapter;

        //mettre request à part pour n'executer qu'une fois
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

    /**
     * 
     */
    public function getList($debut = -1, $limite = -1, $textmax = 500)
    {
        $sql = 'SELECT id, titre, contenu, date_creation, date_modif FROM episodes ORDER BY id DESC'; 

        if ($debut != -1 || $limite != -1) {
            $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
        }
       
        $request = $this->db->query($sql);

        $request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'postController');
        $episodesList = $request->fetchAll();
        $i=0;

        foreach ($episodesList as $episodes) {
            $space = strpos($episodes['contenu'], ' ', $textmax);
            $episodesList[$i]['contenu'] =  substr($episodes['contenu'], 0, $space) . '...';
            $i++;
        }
        $request->closeCursor();
        return $episodesList;
    }

    /*public function getChapters($offset, $limit) {
        $this->dbConnect();
        $offset = (int) $offset;
        $limit = (int) $limit;

        $request= $this->db->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, "%d/%m/%Y") AS jour FROM episodes WHERE id = ? BY date_creation DESC LIMIT :offset, :limit');
        $request->bindParam(':offset', $offset, PDO::PARAM_INT);
        $request->bindParam(':limit', $limit, PDO::PARAM_INT);$request->execute(array($postId));
        $chapters = $request->fetchAll();
        return $chapters;
    }*/

    public function getEpisode($id)

    {
        $request = $this->db->prepare('SELECT id, titre, contenu, date_creation, date_modif FROM episodes WHERE id = :id');
        $request->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $request->execute();
        $request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'postController');
        $episodes = $request->fetchAll();
        
        return $episodes[0];
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
