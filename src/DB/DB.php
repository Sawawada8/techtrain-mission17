<?php
namespace MyFrameWork\DB;

class DB
{
    private static $instance;

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new DB();
        }
        return self::$instance;
    }

    private function __construct()
    {
    }

    public static function connect()
    {
        $db = new PDO();
    }
}
