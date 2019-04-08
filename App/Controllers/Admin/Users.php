<?php

namespace App\Controllers\Admin;

/**
 * User admin controller
 */

 class Users extends \Core\Controller
 {

   /**
    * Before filter
    *
    * @return void
    */
     protected function before(): void
     {
         // Make sure an admin user is logged in, for example
      // return false;
     }

     /**
      * Show index page
      *
      * @return void
      */
     public function index(): void
     {
         echo 'User admin index';
     }
 }
