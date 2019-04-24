<?php

$router->get('/', 'Homiedopie\App\Controllers\HomeController@index');
$router->post('/ajax/addRecord', 'Homiedopie\App\Controllers\HomeController@addRecordSession');
$router->get('/ajax/getRecords', 'Homiedopie\App\Controllers\HomeController@getRecordsSession');