<?php

namespace app\core;

class Controller
{

    function __construct()
    {

    }

    public function render($view)
    {
        return Application::$application->router->renderView($view);
    }

}