<?php

namespace app\core;


class Response
{
    public static function setStatusCode(int $status): void
    {
        http_response_code($status);
    }

    public static function redirect(string $url): void
    {
        header('Location: ' . $url);
        exit;
    }
}