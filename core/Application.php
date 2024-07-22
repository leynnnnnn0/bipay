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
    public Session $session;
    public ?DbModel $applicationUser;


    function __construct(string $rootPath, $config)
    {
        self::$ROOT_PATH = $rootPath;
        self::$application = $this;
        $this->session = new Session();
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router();
        $this->controller = new Controller();
        $this->style = new Style();
        $this->database = new Database($config['database']);
        $this->applicationUser = new $config['userClass']();
        if($this->applicationUser)
            self::login();


    }

    public function login(): void
    {
        $query = "SELECT e.*, a.username, a.password
                  FROM employees e
                  JOIN accounts a ON e.email = a.email
                  WHERE e.email = :email";
        $statement = $this->database->query($query, ['email' => Session::get('email')]);
        $result = $statement->fetch();
        $this->applicationUser->loadData($result);
    }


    public function run(): void
    {
//        debug($this->router->routes);
        echo $this->router->resolve();
    }
}