<?php

namespace App\Model;

class Article
{
    private $id_article;
    private $titre;
    private $description;
    private $date;

    /**
     * Get the value of id_article
     */
    public function getId_article()
    {
        return $this->id_article;
    }

    /**
     * Set the value of id_article
     *
     * @return  self
     */
    public function setId_article($id_article)
    {
        $this->id_article = $id_article;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of titre
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }
}
