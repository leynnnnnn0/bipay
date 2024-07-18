<?php

namespace app\core;

class Style
{
    public function sideBarButton(string $route): bool|string
    {
        $uri = Request::url();
        if($route === $uri)
        {
            return 'bg-gray-300';
        }
        return false;
    }
}