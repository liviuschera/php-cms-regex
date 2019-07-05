<?php

namespace App\Models;

use App\Config;

/**
 * Post model
 */
class Post extends \Core\Model
{

    /**
     * Get all the posts as an object
     *
     * @return array
     */
    public static function getPosts(int $offset = 0): array
    {
        try {
            $db = static::getDB();

            // $stmt = $db->query('');
            // $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // return $results;


            $query = 'SELECT
            users.firstName AS firstName,
            users.lastName AS lastName,
            posts.userID AS userID,
            posts.title AS title,
            posts.createdAt AS createdAt,
            post_body.postID AS postID,
            post_body.content AS content,
            post_images.img_name AS imgName,
            (SELECT count(*) FROM comments WHERE comments.post_id = posts.id) AS commentCount
            FROM users
            JOIN posts ON users.id = posts.userID
            JOIN post_body ON posts.id = post_body.postID
            JOIN post_images ON posts.id = post_images.post_id
            ORDER BY posts.createdAt DESC';

            // First get the row count
            $stmt = $db->query($query);
            $stmt->execute();
            $_SESSION['row_count_posts'] = $stmt->rowCount();

            // Now add the LIMIT clause
            $limit = " LIMIT " . $offset . "," . Config::ROWS_PER_PAGE_POSTS;
            $stmt = $db->query($query . $limit);
            $stmt->execute();
            $results = $stmt->fetchAll();
            return $results;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
