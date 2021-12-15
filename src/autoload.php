<?php

include '../vendor/autoload.php';


$include_files = [
    __DIR__.'/Routing/Route.php',
    __DIR__.'/Model/Model.php',
];

foreach($include_files as $path) {
    echo $path.'<br>';
    require_once realpath($path);
}

// load .env
$dotenv = Dotenv\Dotenv::createImmutable(realpath(__DIR__.'/../'));
$dotenv->load();
