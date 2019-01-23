<?php

namespace App\Model;

use \Core\Model;

require('Model.php');

class PostModel extends Model
{
    public function findById($postId) // construct ?
    {
        $this->dbConnect();
        $request= $this->db->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, "%d/%m/%Y") AS jour FROM billets WHERE id = ?');
        $request->execute(array($postId));
        $chapter = $request->fetch();
        return $chapter;

        //mettre request à part pour n'executer qu'une fois
    }

    public function getChapters($offset, $limit) {
        $this->dbConnect();
        $offset = (int) $offset;
        $limit = (int) $limit;

        $request= $this->db->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, "%d/%m/%Y") AS jour FROM billets WHERE id = ? BY date_creation DESC LIMIT :offset, :limit');
        $request->bindParam(':offset', $offset, PDO::PARAM_INT);
        $request->bindParam(':limit', $limit, PDO::PARAM_INT);$request->execute(array($postId));
        $chapters = $request->fetchAll();
        return $chapters;
    }
}