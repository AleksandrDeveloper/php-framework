<?php 
    require '../vendor/core/Route.php';
    require '../vendor/libs/functions.php';
    require '../app/controller/Main.php';
    require '../app/controller/Posts.php';

    $query = $_SERVER['QUERY_STRING'];

    Route::add('^$',['controller'=>'Main','action'=>'index']);
    Route::add('^(?P<controller>[a-z-]+)/(?P<action>[a-z-]+)?$');

    Route::dispatch($query);

?>