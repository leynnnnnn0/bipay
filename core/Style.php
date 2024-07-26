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

    public static function underline(string $param) : bool | string
    {
        if($param === Request::param()) return 'underline decoration-2';
        return false;
    }

    public static function requestStatus(string $status): string
    {
        return match ($status) {
            "APPROVED" => "text-white bg-green-500",
            "PENDING" => "text-white bg-gray-500",
            "REJECTED" => "text-white bg-red-400",
            default => "",
        };
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

    public static function adherence($time): string
    {
        $time = (float) $time;
        if($time >= 95.00) return 'text-green-500';
        if($time >= 75.00) return 'text-yellow-500';
        if($time >= 60.00) return 'text-orange-500';
        return 'text-red-500';
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