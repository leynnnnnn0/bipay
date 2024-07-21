<?php

namespace app\core;

class Controller
{
    public string $layout = 'main';

    public function render($view, $params = []): bool|array|string
    {
        return Application::$application->router->renderView($view, $params);
    }

}