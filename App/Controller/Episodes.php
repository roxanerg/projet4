<?php

class Episodes
{
    protected $errors = [],
              $id,
              $auteur,
              $titre,
              $contenu,
              $date_creation,
              $date_modif;

    const AUTEUR_INVALIDE = 1;
    const TITRE_INVALIDE = 2;
    const CONTENU_INVALIDE = 3;

    public function __construct($values = [])
    {
      if (!empty($values))
      {
        $this->hydrate($values);
      }
    }

    public function hydrate($datas)
    {
      foreach ($datas as $attribut => $value)
      {
          $method = 'set'.ucfirst($attribut);

          if (is_callable([$this, $method])) {
              $this->$method($value);
          }
      }
    }

    public function isNew()
    {
        return empty($this->id);
    }

    public function isValid()
    {
        return !(empty($this->auteur) || empty($this->titre) || empty($this->contenu));
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