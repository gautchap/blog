<?php

namespace App\Core;

use App\Controller\ArticleController;
use App\Controller\HomeController;

class Router
{
    public function run()
    {
        $path = $_SERVER['REQUEST_URI'];
        // var_dump($path);
        switch ($path) {
            case $path === '/':
                $home = new HomeController;
                $home->index();
                break;
            case $path === '/article':
                $article = new ArticleController;
                $article->index();
                break;
            case str_contains($path, "/article?id="):
                $article = new ArticleController;
                $article->show();
                break;
            case str_contains($path, "/edit?id="):
                $article = new ArticleController;
                $article->edit();
                break;
        }
    }
}
