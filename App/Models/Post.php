<?php

namespace App\Models;

use PDO;

/**
 * Post model
 */
class Post extends \Core\Model
{

   /**
    * Get all the posts as an associative array
    *
    * @return array
    */
    public static function getAll():array
    {
        try {
            $db = static::getDB();

            $stmt = $db->query('');
            $results= $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
