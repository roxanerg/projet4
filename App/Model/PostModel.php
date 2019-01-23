<?php

namespace App\Model;

use \Core\Model;

require('Model.php');

class PostModel extends Model
{
    public function findById($postId)
    {
        $this->dbConnect();
        $request= $this->db->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, "%d/%m/%Y") AS jour FROM billets WHERE id = ?');
        $request->execute(array($postId));
        $chapter = $request->fetch();
        return $chapter;
    }
}
