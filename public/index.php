<?php
  require __DIR__ . '/../vendor/autoload.php';


$app = new Homiedopie\Core\Main();
$router = $app->router();
require __DIR__ . '/../config/routes.php';
$app->start();
