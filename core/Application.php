<?php

namespace app\core;

class Application
{
    public static string $ROOT_PATH;
    public static Application $application;
    public Router $router;
    public Request $request;
    public Controller $controller;
    public Response $response;
    function __construct(string $rootPath)
    {
        self::$ROOT_PATH = $rootPath;
        self::$application = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->controller = new Controller();
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}