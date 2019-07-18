<?php

$container = $app->getContainer();
$capsule = new \Illuminate\Database\Capsule\Manager();
$capsule->addConnection($container["settings"]["db"]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container["db"] = function () use ($capsule) {
    return $capsule;
};

$container["ClientController"] = function($container){
    return new App\Controllers\ClientController($container);
};

$container["LoanController"] = function($container){
    return new App\Controllers\LoanController($container);
};

