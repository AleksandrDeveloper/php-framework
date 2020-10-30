<?php 
    namespace vendor\core;

    class Route
    {
        protected static $routes = [];
        protected static $route;

        public static function add($regexp,$route = [])
        {
            self::$routes[$regexp] = $route;
        }

        public static function getRoutes()
        {
            return self::$routes;
        }
        public static function getRoute()
        {
            return self::$route;
        }

        public static function matchRoute($url)
        {
            foreach (self::$routes as $pattern => $route) {
                if(preg_match("#$pattern#i",$url,$matches)){
                    foreach($matches as $k => $v){
                        if(is_string($k)){
                            $route[$k] = $v;
                        }
                    }
                    if(!isset($route['action'])){
                        $route['action'] = 'index';
                    }
                    $route['controller'] = self::upperCameCase($route['controller']);
                    self::$route = $route;
                    return true;
                }
            }
            return false;
        }

        public static function dispatch($url)
        {
            if(self::matchRoute($url)){  
                $controller = 'app\controller\\' . self::upperCameCase(self::$route['controller']);

                if(class_exists($controller)){
                    $control = new $controller(self::$route);
                    $action = self::lowerCameCase(self::$route['action']) . 'Action';

                    if(method_exists($control,$action)){ 
                        $control->$action();
                    }else{ 
                        echo '<br> Action not found';
                    }
                }else{ echo "Not found controller <br>$controller"; }

            }else{
                http_response_code(404);
                include '404.html';
            }
        }

        protected static function upperCameCase($str)
        {
            $str = str_replace('-',' ',$str);
            $str = ucwords($str);
            $str = str_replace(' ','',$str);
            return $str;
        }
        protected static function lowerCameCase($str)
        {
            return lcfirst(self::upperCameCase($str));
        }
    }
?>