<?php
namespace Core;

use App\Config;
use PDO;

/**
 * Base model
 */
abstract class Model
{
    protected static function getDB()
    {
        static $db = null;

        if ($db === null) {
            try {
                $dsn = 'mysql:host=' . Config::DB_HOST .
                    ';dbname=' . Config::DB_NAME .
                    ';charset=utf8';

                $options = [
                    PDO::ATTR_PERSISTENT => true,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                ];

                $db = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD, $options);

                // Throw an Exception when an error occurs
                // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        return $db;
    }
}
