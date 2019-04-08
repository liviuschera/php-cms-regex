<?php

namespace App\Controllers;

use \Core\View;

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
         View::renderTemplate('Posts/index.html.twig');
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
     protected function before():void
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
