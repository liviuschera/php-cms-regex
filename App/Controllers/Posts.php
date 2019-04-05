<?php

namespace App\Controllers;

/**
 * Posts controller
 *
 * PHP version 7.1+
 */

 class Posts
 {

   /**
    * Show the index page
    *
    * @return void
    */
     public function index(): void
     {
         echo 'Hello from the index action in the Posts controller!';
     }

     /**
      * Show the add new page
      *
      * @return void
      */
     public function addNew(): void
     {
         echo 'Hello from the addNew action in the Post controller!';
     }
 }
