<?php
namespace MyFrameWork;

use Exception;
use MyFrameWork\Routing\Route;
use MyFrameWork\Controller\Controller;
use App\Controllers;
use Dotenv\Dotenv;

class Application
{
    /**
     * application の初期化
     */
    public function __construct()
    {
        $this->loadEnv();
    }

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

    /**
     * load env
     * @return void
     */
    public function loadEnv()
    {
        $dotenv = Dotenv\Dotenv::createImmutable(realpath(__DIR__ . "/../"));
        $dotenv->load();
    }
}
