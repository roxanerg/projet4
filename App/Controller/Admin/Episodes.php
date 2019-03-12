<?php
    namespace App\Controller\Admin;
    use Core\Controller;
    use App\Model;

class Episodes extends \Core\Controller
{   
    function viewAll()
    {
        $postModel = new \App\Model\Episodes();
        $episodes = $postModel->list(0, 50, 300);
        $this->view->displayAdmin('episodes', ['episodes' => $episodes]);
    }

    function edit($id=0, $post)  
    {      
        $postModel = new \App\Model\Episodes();
        if (!empty($post)) 
        {
            $edit_post = $postModel->update($id, $post['titre'], $post['contenu']);
        }
        $episode = $postModel->get($id);
        $this->view->displayAdmin('episode', ['episode' => $episode]);
     }
    
    function add($post)
    {
        $postModel = new \App\Model\Episodes();
        $add_post = $postModel->add($post['titre'], $post['contenu'], $post['date_creation']);
        return $add_post;
    }

    function delete($id=0)
    {
        $postModel = new \App\Model\Episodes();
        $deleted = $postModel->delete($id);
    }
    
    protected $errors = [],
              $id,
              $titre,
              $contenu,
              $date_creation,
              $date_modif;

    const TITRE_INVALIDE = 1;
    const CONTENU_INVALIDE = 2;

    public function isNew()
    {
        return empty($this->id);
    }

    public function isValid()
    {
        return !(empty($this->titre) || empty($this->contenu));
    }

    // SETTERS //
    public function setId($id)
    {
        $this->id = (int) $id;
    }

    public function setTitle($titre)
    {
        if (!is_string($titre) || empty($titre))
        {
            $this->errors[] = self::TITRE_INVALIDE;
        }
        else
        {
            $this->titre = $titre;
        }
    }

    public function setContent($contenu)
    {
        if (!is_string($contenu) || empty($contenu))
        {
          $this->errors[] = self::CONTENU_INVALIDE;
        }
        else
        {
          $this->contenu = $contenu;
        }
    }

    public function setDateCreation(DateTime $date_creation)
    {
        $this->dateAjout = $dateAjout;
    }

    public function setDateModif(DateTime $date_modif)
    {
        $this->dateModif = $dateModif;
    }

    // GETTERS //

    public function errors()
    {
        return $this->errors;
    }

    public function id()
    {
        return $this->id;
    }

    public function titre()
    {
        return $this->titre;
    }

    public function contenu()
    {
        return $this->contenu;
    }

    public function dateAjout()
    {
        return $this->date_creation;
    }

    public function dateModif()
    {
        return $this->date_modif;
    }
}
