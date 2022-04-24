<?php
/**
 * Created by PhpStorm.
 * User: Malik Al Ichsan <malik.al.ichsan@gmail.com>
 */

$router->group(['prefix' => 'v1'], function () use ($router) {
    $router->group(['middleware' => 'api_key'], function ($router) {
        $router->post('/process', 'ProcessController@show');
    });
});