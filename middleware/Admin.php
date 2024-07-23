<?php

namespace app\middleware;

use app\core\Application;
use app\core\Response;
use app\core\Session;

class Admin
{
    public static function handle($route): void
    {
        if($route === 'admin' && Application::$application->applicationUser->getRole() !== 'ADMIN' )
        {
            Response::setStatusCode(401);
            Response::redirect('/');
        }
    }
}