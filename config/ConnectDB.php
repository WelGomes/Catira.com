<?php

namespace Config;

use PDO;
use PDOException;

abstract class ConnectDB 
{

    public static function connectPDO(): PDO
    {
        try {
            $pdo = new PDO("mysql:host=127.0.0.1;dbname=catira", "root", "Root.123", [
                PDO::ATTR_PERSISTENT => true,
            ]);
            
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;
        } catch(PDOException $ex) {
            echo "Error: {$ex->getMessage()}";
        }
    }
}


?>