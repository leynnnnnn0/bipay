<?php

namespace app\core;

class Session
{

    public array $messages = [];
    function __construct()
    {
        session_start();
    }

    function set_flash($key, $value): void
    {
        $this->messages["_flash"][$key] = [
            'message' => $value,
            'remove' => false
        ];
    }

    function get_flash($key) : string | bool
    {
        return $this->messages[$key]['message'] ?? false;
    }
}