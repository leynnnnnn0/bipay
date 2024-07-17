<?php

namespace app\core;

class Response
{
    public function setStatusCode(int $status)
    {
        http_response_code($status);
    }
}