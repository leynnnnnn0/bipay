<?php

namespace app\constant;

enum Status : string
{
    case ONBOARDING = 'ONBOARDING';
    case FULL_TIME = 'FULL-TIME';
    case PART_TIME = 'PART-TIME';
    case SEASONAL = 'SEASONAL';

    public static function getStatus()
    {
        return [
            self::ONBOARDING->value,
            self::FULL_TIME->value,
            self::PART_TIME->value,
            self::SEASONAL->value,
        ];
    }
}