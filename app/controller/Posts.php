<?php 

    namespace app\controller;
    use vendor\core\base\Controller;

class Posts extends Controller
    {

        public function indexAction(){
            debug($this->route); 
        }
        public static function testAction(){
            echo 'Posts testAction <br>';
        }
        public static function before(){
            echo 'Posts before';
        }
    }
?>