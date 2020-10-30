<?php  error_reporting(-1);

    use vendor\core\Route;

    define('WWW',__DIR__);
    define('CORE',dirname(__DIR__). '/vendor/core');
    define('ROOT',dirname(__DIR__));
    define('APP',dirname(__DIR__) . '/app');

    require '../vendor/libs/functions.php';

    spl_autoload_register(function($class){
        $file = ROOT . '/' . str_replace('\\','/', $class) . '.php';
        if($file){ 
            require_once $file;
        }
    });

    $query = $_SERVER['QUERY_STRING'];

    // url path , object;
    Route::add('^$',['controller'=>'Main','action'=>'index']);
    Route::add('^pages/?(?P<action>[a-z-]+)?$',['controller'=>'Post',]);
    Route::add('^(?P<controller>[a-z-]+)/(?P<action>[a-z-]+)?$');

    Route::dispatch($query);


?>