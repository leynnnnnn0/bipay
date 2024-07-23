<?php

namespace app\constant;

enum AuxTag : string
{
    case NOT_READY = "NOT READY";
    case WORKING = "WORKING";
    case PERSONAL_TIME = "PERSONAL TIME";
    case BREAK = "BREAK";
    case MEAL_BREAK = "MEAL BREAK";
    case MEETING = "MEETING";

    public static function getAux()
    {
        return [
            self::NOT_READY->value,
            self::WORKING->value,
            self::PERSONAL_TIME->value,
            self::BREAK->value,
            self::MEAL_BREAK->value,
            self::MEETING->value,
        ];
    }
}