<?php

namespace App\Controllers;

use \Core\View;
use \App\Config;
use \Core\Model;
use App\Models\Post;

/**
 * Home controller
 */

class Home extends \Core\Controller
{
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

        // echo "<pre>";
        // echo print_r($posts, true);
        // echo "</pre>";
        // $posts = $this->postModel->getPosts($offset);
        $data = ['posts' => $posts];

        // $this->view('posts/index', $data);
        //  echo 'Hello from the index action in the Home controller!';
        //  View::render('Home/index.php', [
        //     'name'    => 'Dave',
        //     'colours' => ['red', 'green', 'blue']
        // ]);


        // $fb_graph_url = '';
        // $fb_graph_title = '';
        // $fb_graph_description = '';
        // $fb_graph_image = '';

        // if (isset($data['post'])) {
        //     $fb_graph_url = trim(URLROOT . "/posts/show/" . $data['post']->postID);
        //     $fb_graph_title = $data['post']->title;
        //     $fb_graph_description = strip_tags(substr($data['post']->content, 0, 280));
        //     $fb_graph_image = URLROOT . BLOG_IMG_DIR . $data['post']->imgName;
        // }

        View::renderTemplate('Home/index.html.twig', [
            'site_name' => Config::SITENAME,
            "data_POST" => $data['post'],
            'fb_graph_url' => trim(Config::URLROOT . "/posts/show/" . $data['post']->postID),
            'fb_graph_title' => $data['post']->title,
            'fb_graph_description' => strip_tags(substr($data['post']->content, 0, 280)),
            'fb_graph_image' => Config::URLROOT . Config::BLOG_IMG_DIR . $data['post']->imgName
        ]);
    }
}
