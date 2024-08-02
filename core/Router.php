<?php

namespace app\core;

use app\middleware\Admin;
use app\middleware\Auth;
use app\middleware\Guest;

class Router
{
    public array $routes = [];

    public function get($path, $callback): static
    {
        $this->routes[] = [
            'method' => 'GET',
            'uri' => $path,
            'callback' => $callback,
            'middleware' => null
        ];
        return $this;
    }

    public function post($path, $callback): static
    {
        $this->routes[] = [
            'method' => 'POST',
            'uri' => $path,
            'callback' => $callback,
            'middleware' => null
        ];
        return $this;
    }

    public function delete($path, $callback): static
    {
        $this->routes[] = [
            'method' => 'DELETE',
            'uri' => $path,
            'callback' => $callback,
            'middleware' => null
        ];
        return $this;
    }

    public function put($path, $callback): static
    {
        $this->routes[] = [
            'method' => 'PUT',
            'uri' => $path,
            'callback' => $callback,
            'middleware' => null
        ];

        return $this;
    }

    public function middleware($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    }

    public function resolve()
    {
        $uri = Request::url();
        $method = Request::method();
        $callback = false;
        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['uri'] === $uri)
            {
                if($route['middleware'] != null)
                {
                    Auth::handle($route['middleware']);
                    Guest::handle($route['middleware']);
                    Admin::handle($route['middleware']);

                }
                $callback = $route['callback'];
            }
        }
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