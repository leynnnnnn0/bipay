<?php

namespace app\core;

class Router
{
    public array $routes = [];
    public Request $request;
    public Response  $response;

    function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }
    public function get($path, $callback)
    {
        $this->routes['GET'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['POST'][$path] = $callback;
    }

    public function resolve()
    {
        $uri = $this->request->url();
        $method = $this->request->method();
        $callback = $this->routes[$method][$uri] ?? false;
        if(!$callback)
        {
            $this->response->setStatusCode(404);
            return "PAGE NOT FOUND";
        }
        Application::$application->controller = new $callback[0]();
        $callback[0] = Application::$application->controller;

        return call_user_func($callback, $this->request);
    }

    public function renderView($view)
    {
        $viewLayout = $this->viewLayout();
        $viewContent = $this->viewContent($view);
        return str_replace("{{Main Content}}", $viewContent, $viewLayout);
    }

    public function viewContent($view)
    {
        ob_start();
        require Application::$ROOT_PATH . "\\view\\$view.php";
        return ob_get_clean();
    }

    public function viewLayout()
    {
        ob_start();
        require Application::$ROOT_PATH . "\\view\\layout\\main.php";
        return ob_get_clean();
    }


}