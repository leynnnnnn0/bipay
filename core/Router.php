<?php

namespace app\core;

class Router
{
    public array $routes = [];

    public function get($path, $callback): void
    {
        $this->routes['GET'][$path] = $callback;
    }

    public function post($path, $callback): void
    {
        $this->routes['POST'][$path] = $callback;
    }

    public function resolve()
    {
        $uri = Request::url();
        $method = Request::method();
        $callback = $this->routes[$method][$uri] ?? false;
        if(is_string($callback)) return $callback;
        if(!$callback)
        {
            Response::setStatusCode(404);
            return "PAGE NOT FOUND";
        }
        Application::$application->controller = new $callback[0]();
        $callback[0] = Application::$application->controller;

        return call_user_func($callback);
    }

    public function renderView($view): array|bool|string
    {
        $viewLayout = $this->viewLayout();
        $viewContent = $this->viewContent($view);
        return str_replace("{{Main Content}}", $viewContent, $viewLayout);
    }

    public function viewContent($view): bool|string
    {
        ob_start();
        require Application::$ROOT_PATH . "\\view\\$view.php";
        return ob_get_clean();
    }

    public function viewLayout(): bool|string
    {
        ob_start();
        require Application::$ROOT_PATH . "\\view\\layout\\main.php";
        return ob_get_clean();
    }


}