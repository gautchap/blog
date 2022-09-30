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
        if (isset($_POST['send'])) $this->add();
        if (isset($_POST['delete'])) $this->delete();

        ob_start();
        require(dirname(__DIR__) . '/view/article.php');
        $body = ob_get_clean();

        require(dirname(__DIR__) . '/view/base.php');
    }

    public function show()
    {
        $id_article = $_GET['id'];
        $article = $this->article->getOneArticle($id_article);
        if (!$article) header('location:/article');

        ob_start();
        require(dirname(__DIR__) . '/view/show.php');
        $body = ob_get_clean();

        require(dirname(__DIR__) . '/view/base.php');
    }

    protected function add()
    {
        if (isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['description']) && !empty($_POST['description'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];

            $this->article->addArticle($title, $description);
            $articles = $this->article->getAllArticle();
            $id = $articles[0]->getId_article();
            header("location:/article?id={$id}");
        }
    }



    protected function delete()
    {
        $id = $_POST['id'];
        $this->article->deleteArticle($id);

        header("Refresh:0");
    }

    public function edit()
    {
        $id = $_GET['id'];
        $article = $this->article->getOneArticle($id);

        if (isset($_POST['send'])) $this->update();

        ob_start();
        require(dirname(__DIR__) . '/view/editArticle.php');
        $body = ob_get_clean();

        require(dirname(__DIR__) . '/view/base.php');
    }

    protected function update()
    {
        if (isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['description']) && !empty($_POST['description']) && strlen($_POST['title']) <= 50 && strlen($_POST['description']) <= 200 && is_string($_POST['title']) && is_string($_POST['description'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $articles = $this->article->getAllArticle();
            $id = $articles[0]->getId_article();

            $this->article->updateArticle($title, $description, $id);

            header("location:/article?id={$id}");
        } else {
            echo 'une erreur est survenue';
        }
    }
}
