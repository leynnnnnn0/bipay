<?php

namespace app\core;

class Style
{
    public Request $request;
    function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function sideBarButton(string $route)
    {
        $uri = $this->request->url();
        if($route === $uri)
        {
            return 'bg-gray-300';
        }
        return false;
    }
}