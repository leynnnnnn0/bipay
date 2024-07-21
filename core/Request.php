<?php

namespace app\core;

class Request
{
    public static function url(): bool|array|int|string|null
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public static function method() : string
    {
        return $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
    }

    public static function customMethod() : string | bool
    {
        return $_POST['_method'] ?? false;
    }

}