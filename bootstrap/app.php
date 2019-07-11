<?php
use Dotenv\Dotenv;

$dotenv = Dotenv::create(BASE);
$dotenv->load();
$app = new Slim\App(require_once (BASE . "bootstrap" . DS . "config.php"));
require_once BASE . 'bootstrap' . DS . 'container.php';
require_once SRC . 'routes.php';
$app->run();
