<?php

namespace app\middleware;

use app\core\Response;
use app\core\Session;

class Auth
{
    public static function handle($route): void
    {
        if($route === 'auth' && !Session::get('email'))
        {
            Response::setStatusCode(401);
            Response::redirect('/login');
        }
    }
}