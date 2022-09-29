<?php

namespace App\Config;

use PDO;

class DataBase
{
    private $connexion;

    /**
     * Get the value of connexion
     */
    public function getConnexion()

    {
        $this->connexion = new PDO('mysql:host=localhost;dbname=blog', 'root', 'admin');
        return $this->connexion;
    }
}
