<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Post;

/**
 * Posts controller
 *
 * PHP version 7.1+
 */

class Posts extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function index(): void
    {
        $offset = "";
        if (!isset($_POST['page']) || $_POST['page'] == '1') {
            $offset = 0;
        } else {
            $offset = $_POST['page'];
        }
        $posts = Post::getPosts($offset);
        // $posts = $this->postModel->getPosts($offset);
        $data = ['posts' => $posts];
        // View::renderTemplate('Posts/index.html.twig');
        View::renderTemplate('Posts/index.html.twig', [
            'site_name' => Config::SITENAME,
            "data_POST" => $data['post'],
            'fb_graph_url' => trim(Config::URLROOT . "/posts/show/" . $data['post']->postID),
            'fb_graph_title' => $data['post']->title,
            'fb_graph_description' => strip_tags(substr($data['post']->content, 0, 280)),
            'fb_graph_image' => Config::URLROOT . Config::BLOG_IMG_DIR . $data['post']->imgName
        ]);
    }

    /**
     * Show the add new page
     *
     * @return void
     */
    public function addNew(): void
    {
        echo 'Hello from the addNew action in the Posts controller!';
    }

    /**
     * Show the edit page
     *
     * @return void
     */
    public function edit(): void
    {
        echo 'Hello from the edit action in the Posts controller!';
        echo '<p>Route parameters: <pre>' .
            htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';
    }

    /**
     * Before filter
     *
     * @return void
     */
    protected function before(): void
    {
        echo "(before) ";
        //  return false;
    }

    /**
     * After filter
     *
     * @return void
     */
    protected function after(): void
    {
        echo " (after)";
    }
}
