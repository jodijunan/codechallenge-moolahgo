<?php
  require __DIR__ . '/../vendor/autoload.php';

$app = new Homiedopie\Core\Main();
$app->router()->route('/test', 'Homiedopie\App\Controllers\TestController@test');
$app->start();
