<?php

namespace App\Controller;

use App\Model\ArticleRepository;

class ArticleController
{
    private $article;

    public function __construct()
    {
        $this->article = new ArticleRepository();
    }

    public function index()
    {
        $articles = $this->article->getAllArticle();
        // var_dump($articles);
        ob_start();
        require(dirname(__DIR__) . '/view/article.php');
        $body = ob_get_clean();

        require(dirname(__DIR__) . '/view/base.php');
    }

    public function show()
    {
        $id_article = $_GET['id'];
        $article = $this->article->getOneArticle($id_article);

        ob_start();
        require(dirname(__DIR__) . '/view/show.php');
        $body = ob_get_clean();

        require(dirname(__DIR__) . '/view/base.php');
    }
}
