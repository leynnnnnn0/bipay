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

    public function delete($path, $callback): void
    {
        $this->routes['DELETE'][$path] = $callback;
    }

    public function put($path, $callback): void
    {
        $this->routes['PUT'][$path] = $callback;
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

    public function renderView($view, $params = []): array|bool|string
    {
        $viewLayout = $this->viewLayout();
        $viewContent = $this->viewContent($view, $params);
        return str_replace("{{Main Content}}", $viewContent, $viewLayout);
    }

    public function viewContent($view, $params = []): bool|string
    {
        extract($params);
        ob_start();
        require Application::$ROOT_PATH . "\\view\\$view.php";
        return ob_get_clean();
    }

    public function viewLayout(): bool|string
    {
        $viewLayout = Application::$application->controller->layout;
        ob_start();
        require Application::$ROOT_PATH . "\\view\\layout\\$viewLayout.php";
        return ob_get_clean();
    }


}