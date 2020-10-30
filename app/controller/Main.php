<?php 
    namespace app\controller;

    class Main
    {
        public function __construct()
        {
            echo 'Main __construct <br>';
        }

        public static function indexAction(){
            echo 'Main indexAction <br>';
        }
        public static function testAction(){
            echo 'Main testAction <br>';
        }
    }
?>