<?php

namespace App;

/**
 * Application configuration

 */
class Config
{

   /**
    * Database host
    * @var string
    */
   const DB_HOST = 'localhost';

   /**
    * Database name
    * @var string
    */
   const DB_NAME = 'oildiscovery';

   /**
    * Database user
    * @var string
    */
   const DB_USER = 'root';

   /**
    * Database password
    * @var string
    */
   const DB_PASSWORD = 'd';

   /**
    * Show or hide error messages on screen
    * @var boolean
    */
   const SHOW_ERRORS = true;

   /**
    * Root URL
    * @var string
    */
   const URLROOT = "http://localhost/oildiscovery";

   /**
    * Website name
    * @var string
    */
   const SITENAME = 'Oil Discovery with Michelle';

   /**
    * Admin dashboard name
    * @var string
    */
   const ADMIN_DASHBOARD_NAME = 'Oil Discovery Admin Dashboard';

   /**
    * Number of rows to be displayed when searching for users in dashboard
    * @var int
    */
   const ROWS_PER_PAGE_USERS = 2;

   /**
    * Number of rows with blog posts to be displayed in the posts index
    * @var int
    */
   const ROWS_PER_PAGE_POSTS = 6;

   /**
    * Path for the blog post images
    * @var string
    */
   const BLOG_IMG_DIR = '/images/blog/';

   /**
    * Path for the users images
    * @var string
    */
   const USER_IMG_DIR = '/images/users/';

   // Facebook initialization
   const FB_APP_ID = '548221059031502';
   const FB_APP_SECRET = '78649a9365addd45aa8cf0f7c90efbf6';
   const FB_APP_GRAPH_VERSION = 'v3.2';
   const FB_APP_CALLBACK_URL = 'http://localhost/oildiscovery/users/index.php';
}

// App root
define('APPROOT', dirname(dirname(__FILE__)));
// Site root
define('PUBLICROOT', $_SERVER['DOCUMENT_ROOT'] . '/oildiscovery/public/');
// Vendor dir
define('VENDORROOT', $_SERVER['DOCUMENT_ROOT'] . '/oildiscovery/vendor/');
