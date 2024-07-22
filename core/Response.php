<?php

namespace app\core;


use JetBrains\PhpStorm\NoReturn;

class Response
{
    public static function setStatusCode(int $status): void
    {
        http_response_code($status);
    }

    #[NoReturn] public static function redirect(string $url): void
    {
        header('Location: ' . $url);
        exit;
    }
}