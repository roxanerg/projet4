<?php

require_once('../Core/Controller.php');
require_once('../Core/View.php');
require_once('../App/Model/PostModel.php');

class Episodes extends Controller
{
    
    function viewAll()
    {
        $postModel = new PostModel();
        $episodes = $postModel->list(0, 50, 300);
        $this->view->displayAdmin('episodes', ['episodes' => $episodes]);
    }

    function edit($id=0, $post)  
    {      
        $postModel = new PostModel();
        if (!empty($post)) 
        {
            $edit_post = $postModel->update($id, $post['titre'], $post['contenu']);
        }
        $episode = $postModel->get($id);
        $this->view->displayAdmin('episode', ['episode' => $episode]);
     }
    
    function add($post)
    {
        $postModel = new PostModel();
        $add_post = $postModel->add($post['titre'], $post['contenu'], $post['date_creation']);
    }

    function delete($id=0)
    {
        $postModel = new PostModel();
        $deleted = $postModel->delete($id);
    }
    

    /* exemple sauvegarde
    public function save(Episodes $episodes)
    {
        if ($episodes->isValid()) {
            $episodes->isNew() ? $this->add($episodes) : $this->update($episodes);
        }
        else {
            throw new RuntimeException('La news doit être valide pour être enregistrée');
        }
    }*/
    
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
