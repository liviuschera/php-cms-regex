<?php

/**
 * Front controller
 *
 * PHP version 7+
 */


/**
 * Routing
 */
 require '../Core/Router.php';
 $router = new Router();

//  Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add(
    'posts/new',
    ['controller' => 'Posts', 'action' => 'new']
);

// Match the requested route
$url = $_SERVER['QUERY_STRING'];

if ($router->match($url)) {
    var_dump($router->getParams());
} else {
    echo "No route found for URL '$url'";
}
