<?php
namespace MyFrameWork\Routing;

use Exception;

class Route
{
    /**
     * @var MyFrameWork\Roting\Route
     */
    private static $route;

    /**
     * 登録された path と action
     * ['path' => [
     *    'controller' => 'controllername',
     *    'action'     => 'action name'
     * ]]
     * @var array
     */
    public $getRoutes = [];

    /**
     * 登録された path と action
     * @var array
     */
    public $postRoutes = [];

    /**
     * 登録された path と action
     * @var array
     */
    public $putRoutes = [];

    /**
     * @param array $getRoutes
     * @param array
     * @param array
     * @return self
     */
    public static function getInstance(
        $getRoutes = [],
        $postRoutes = [],
        $putRoutes = []
    ) {
        if (!isset(self::$route)) {
            self::$route = new Route($getRoutes, $postRoutes, $putRoutes);
        }
        return self::$route;
    }

    private function __construct(
        $getRoutes = [],
        $postRoutes = [],
        $putRoutes = []
    ) {
        $this->getRoutes = $getRoutes;
        $this->postRoutes = $postRoutes;
        $this->putRoutes = $putRoutes;
    }

    /**
     * url からweb.phpで指定された、のコントロールのアクションを呼び出す。
     * @param string $url
     * @return void
     */
    public function routing($url)
    {
    }

    /**
     * getメソッドの追加
     * @param string $path
     * @param string|Callable
     * @return self
     */
    public function setGet(string $path, $action)
    {
        $action = explode("@", $action);
        if (count($action) !== 2) {
            throw new Exception(
                "action の指定方法は [controller@action]の形式で指定して下さい。"
            );
        }
        $this->getRoutes[$path] = [
            "controller" => $action[0],
            "action" => $action[1],
        ];
        return $this;
    }

    /**
     * postメソッドの追加
     * @param string $path
     * @param string|Callable
     * @return self
     */
    public function setPost(string $path, $action)
    {
        $action = explode("@", $action);
        if (count($action) !== 2) {
            throw new Exception(
                "action の指定方法は [controller@action]の形式で指定して下さい。"
            );
        }
        $this->postRoutes[$path] = [
            "controller" => $action[0],
            "action" => $action[1],
        ];
        return $this;
    }

    /**
     * putメソッドの追加
     * @param string $path
     * @param string|Callable
     * @return self
     */
    public function setPut(string $path, $action)
    {
        $action = explode("@", $action);
        if (count($action) !== 2) {
            throw new Exception(
                "action の指定方法は [controller@action]の形式で指定して下さい。"
            );
        }
        $this->putRoutes[$path] = [
            "controller" => $action[0],
            "action" => $action[1],
        ];
        return $this;
    }

    /**
     * 各種メソッドの追加
     */
    public function resource()
    {
        return $this;
    }
}
