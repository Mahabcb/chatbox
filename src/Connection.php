<?php

namespace App;

use mysqli;

class Connection
{
    private static $instance = null;
    /**
     * On utilise un singleton pour éviter d'instancier plusieurs pour un même utilisateur
     * @return mysqli
     */
    public static function getConnection(): mysqli
    {
        if(self::$instance === null){
            self::$instance = new mysqli('localhost', 'maha', 'root', 'chat');
        }
        return self::$instance;
    }
}

