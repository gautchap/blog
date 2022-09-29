<?php

namespace App\Model;

use App\Config\DataBase;


class ArticleRepository extends DataBase
{
    private $connexion;

    public function __construct()
    {
        $this->connexion = $this->getConnexion();
    }

    public function getAllArticle()
    {
        $query = $this->connexion->query('SELECT * FROM article');
        $query->setFetchMode($this->connexion::FETCH_CLASS, 'App\Model\Article');

        return $posts = $query->fetchAll();
    }

    public function getOneArticle(int $id_article)
    {
        $query = $this->connexion->prepare('SELECT * FROM article WHERE id_article = ?');
        $query->setFetchMode($this->connexion::FETCH_CLASS, 'App\Model\Article');
        $query->execute(array($id_article));

        return $post = $query->fetch();
    }
}
