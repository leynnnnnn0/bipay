<?php

namespace app\core;

class Request
{
    public static function url(): bool|array|int|string|null
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

}