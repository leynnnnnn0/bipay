<?php

namespace app\middleware;

use app\core\Response;
use app\core\Session;

class Guest
{
    public static function handle($route): void
    {
        if($route === 'guest' && Session::get('email'))
        {
            Response::setStatusCode(301);
            Response::redirect('/');
        }
    }
}