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

    public static function statusStyle(string $status): string
    {
        return match ($status) {
            "ONBOARDING" => "text-black bg-gray-300",
            "SEASONAL" => "text-black bg-yellow-500",
            "PART-TIME" => "text-white bg-blue-400",
            "FULL-TIME" => "text-white bg-green-500",
            default => "",
        };
    }

    public static function isOptionsVisible(string $condition): bool
    {
        return str_contains(Request::url(), $condition);
    }

    public static function emptyImage($condition) : string
    {
        if(empty($condition)) return 'empty.png';
        return $condition;
    }
}