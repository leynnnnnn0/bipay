<?php

namespace app\constant;

enum Gender : string
{
    case MALE = 'Male';
    case FEMALE = 'Female';

    public static function getGenders(): array
    {
        return [
            self::MALE->value,
            self::FEMALE->value
        ];
    }
}