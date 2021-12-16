<?php
use MyFrameWork\Routing\Route;

$route = Route::getInstance();

$route
    ->setGet("/", "HomeController@index")
    ->setPost("/", "HomeController@create")
    ->setGet("/home", "HomeController@test")
    ->setGet("/user", "UserController@index");
