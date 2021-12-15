<?php

class Route
{
    /**
     * 登録された path と action
     */
    public $getRoutes = [];
    /**
     * 登録された path と action
     */
    public $postRoutes = [];
    /**
     * 登録された path と action
     */
    public $putRoutes = [];

    public function __construct(
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
     */
    public function setGet(string $path, $action)
    {
        $action = explode("@", $action);
        $this->getRoutes = [
            $path => [
                $action[0] => $action[1],
            ],
        ];
        return $this;
    }

    /**
     * postメソッドの追加
     */
    public function setPost()
    {
        return $this;
    }

    /**
     * putメソッドの追加
     */
    public function setPut()
    {
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
