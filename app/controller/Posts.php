<?php 
    class Posts
    {
        public function __construct()
        {
            echo 'Posts __construct <br>';
        }
        public static function indexAction(){
            echo 'Posts indexAction <br>';
        }
        public static function testAction(){
            echo 'Posts testAction <br>';
        }
        public static function testPageAction(){
            echo 'Posts testPageAction <br>';
        }
        public static function before(){
            echo 'Posts before';
        }
    }
?>