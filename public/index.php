<?php
  require __DIR__ . '/../vendor/autoload.php';


$app = new Homiedopie\Core\Main();
require __DIR__ . '/../config/database.php';

$router = $app->router();
require __DIR__ . '/../config/routes.php';

$app->start();
