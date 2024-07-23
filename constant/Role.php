<?php

namespace app\constant;

enum Role : string
{
    case ADMIN = 'ADMIN';
    case WEB_DESIGNER = 'WEB DESIGNER';
    case WEB_DEVELOPER = 'WEB DEVELOPER';

    public static function getRole(): array
    {
        return [
            self::ADMIN->value,
            self::WEB_DESIGNER->value,
            self::WEB_DEVELOPER->value,
        ];
    }
}