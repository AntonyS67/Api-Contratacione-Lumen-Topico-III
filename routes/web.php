<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix'=> 'api'],function() use ($router){
    $router->group(['prefix'=>'category'],function() use($router){
        $router->get('/','CategoryController@index');
        $router->post('/create','CategoryController@store');
        $router->get('/{id}','CategoryController@getImage');
    });
    $router->group(['prefix'=>'activity'],function() use($router){
        $router->get('/','ActivityController@index');
        $router->post('/create','ActivityController@store');
        $router->get('/{id}','ActivityController@getActivity');
        $router->get('/category/{categoryId}','ActivityController@getByCategory');
    });
    $router->group(['prefix'=>'task'],function() use($router){
        $router->get('/','TaskController@index');
        $router->post('/create','TaskController@store');
        $router->get('/{id}','TaskController@getTask');
        $router->get('/activity/{activityId}','TaskController@getByActivity');
    });
    $router->group(['prefix'=>'provider'],function() use($router){
        $router->get('/{id}/task/{taskId}','ProviderController@getProvider');
        $router->get('/task/{taskId}','ProviderController@getByTask');
        $router->post('/create','ProviderController@store');
    });
    $router->group(['prefix'=>'hiring'],function() use($router){
        $router->post('/create','HiringController@store');
    });
    
});
