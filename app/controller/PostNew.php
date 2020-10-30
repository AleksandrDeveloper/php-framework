<?php 

    namespace app\controller;
    use vendor\core\base\Controller;

    class PostNew extends Controller
    {
        public function __construct()
        {
            echo 'PostNew __construct <br>';
        }
        public function indexAction()
        {
            echo 'PostNew indexAction <br>';
        }
        public function testAction()
        {
            echo 'PostNew testActio <br>';
        }
    }
?>