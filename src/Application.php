<?php
namespace MyFrameWork;

use Exception;
use MyFrameWork\Routing\Route;
use MyFrameWork\Controller\Controller;
use App\Controllers;

class Application
{
    /**
     * pathに対応するアクションを呼び出す。
     */
    public function routing(Route $route, $path, $method)
    {
        switch ($method) {
            case "GET":
                $action = $route->getRoutes[$path];
                break;
            case "POST":
                $action = $route->postRoutes[$path];
                break;
            case "PUT":
                $action = $route->putRoutes[$path];
                break;
        }

        if (is_null($action)) {
            Controller::show404();
            exit();
        }

        $controller = "App\\Controllers\\" . $action["controller"];
        $action = $action["action"];

        (new $controller())->$action();
    }
}
