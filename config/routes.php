<?php
$router->get('/migrate/record/up', 'Homiedopie\App\Controllers\MigrationController@recordUp');
$router->get('/migrate/record/down', 'Homiedopie\App\Controllers\MigrationController@recordDown');
$router->get('/', 'Homiedopie\App\Controllers\HomeController@index');
$router->post('/ajax/addRecord', 'Homiedopie\App\Controllers\HomeController@addRecordSession');
$router->get('/ajax/getRecords', 'Homiedopie\App\Controllers\HomeController@getRecordsSession');
$router->get('/ajax/getRecordsDB', 'Homiedopie\App\Controllers\HomeController@getRecordsDB');
$router->post('/ajax/addRecordDB', 'Homiedopie\App\Controllers\HomeController@addRecordDB');
$router->get('/test', 'Homiedopie\App\Controllers\TestController@index');
