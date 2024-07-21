<?php

namespace app\constant;

enum Department : string
{
    case HR = 'HR';
    case FINANCE = 'FINANCE';
    case IT = 'IT';

    public static function getDepartments()
    {
        return [
            self::HR->value,
            self::FINANCE->value,
            self::IT->value,
        ];
    }
}