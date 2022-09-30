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
        $query = $this->connexion->query('SELECT
                                                *
                                            FROM
                                                article
                                            ORDER BY
                                                `date`
                                            DESC
                                                ');
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

    public function addArticle(string $title, string $description)
    {
        $query = $this->connexion->prepare("INSERT INTO `article`(`titre`, `description`)
                                            VALUES(?, ?)");
        $query->execute(array($title, $description));
    }

    public function deleteArticle(int $id)
    {
        $query = $this->connexion->prepare("DELETE
                                            FROM
                                                `article`
                                            WHERE
                                                `id_article` = ?");
        $query->execute(array($id));
    }

    public function updateArticle(string $title, string $description, int $id)
    {
        $date = date('Y-m-d');
        $query = $this->connexion->prepare("UPDATE
                                                `article`
                                            SET
                                                `titre` = ?,
                                                `description` = ?,
                                                `date` = ?
                                            WHERE
                                                `id_article` = ?");
        $query->execute(array($title, $description, $date, $id));
    }
}
