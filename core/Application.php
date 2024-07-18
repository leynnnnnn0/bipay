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
    public Style $style;
    public Database $database;
    function __construct(string $rootPath, $config)
    {
        self::$ROOT_PATH = $rootPath;
        self::$application = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router();
        $this->controller = new Controller();
        $this->style = new Style();
        $this->database = new Database($config['database']);
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}