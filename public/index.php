<?php
// echo $_SERVER["REQUEST_URI"];
// exit();
require_once "../vendor/autoload.php";
require_once __DIR__ . "/../app/Route/web.php";

$app = new MyFrameWork\Application();

$route = \MyFrameWork\Routing\Route::getInstance();

$app->routing($route, $_SERVER["REQUEST_URI"], $_SERVER["REQUEST_METHOD"]);
