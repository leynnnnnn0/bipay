<?php

namespace app\core;

class Controller
{

    function __construct()
    {

    }

    public function render($view, $params = []): bool|array|string
    {
        return Application::$application->router->renderView($view, $params);
    }

}