<?php

namespace app\core;

use DateTime;

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

    public static function time($value): string
    {
        try {
            return (new DateTime($value))->format('h:i:s A');
        } catch (\Exception $e) {
            return '';
        }
    }

    public static function adherence($time)
    {
        return match ($time) {
            (int) $time > 95 => 'text-green-500',
            (int) $time > 75 => 'text-yellow-500',
            (int) $time > 60 => 'text-orange-500',
            default => 'text-red-500'
        };
    }

    public static function auxTag(string $status): string
    {
        return match ($status) {
            "NOT READY" => "text-black bg-gray-300",
            "BREAK" => "text-black bg-yellow-500",
            "MEAL BREAK" => "text-black bg-yellow-300",
            "PERSONAL TIME" => "text-white bg-red-400",
            "MEETING" => "text-white bg-blue-500",
            "WORKING" => "text-black bg-green-300",
            default => "",
        };
    }
}