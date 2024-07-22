<?php

namespace app\core;

class Session
{

    public static string $FLASH_KEY = '_flash';
    function __construct()
    {
        session_start();
        $flashMessages = $_SESSION[self::$FLASH_KEY];
        foreach ($flashMessages as $key => &$flashMessage) {
            if($flashMessage['remove'] === false)
                $flashMessage['remove'] = true;
        }
        $_SESSION[self::$FLASH_KEY] = $flashMessages;
    }

    public static function set($key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key): string | array | bool
    {
        return $_SESSION[$key] ?? false;
    }


    public static function set_flash($key, $value): void
    {
        $_SESSION[self::$FLASH_KEY][$key] = [
            'message' => $value,
            'remove' => false
        ];
    }

    public static function get_flash($key) : string | bool | array
    {
        return $_SESSION["_flash"][$key] ?? false;
    }


    public static function getFlashDetailsErrors($key): bool | string
    {
        $errors = Session::get_flash('details')['message'];
        return $errors->errors[$key][0] ?? false;

    }

    public static function getFlashDetailsInput($key): bool | string
    {
        $value = Session::get_flash('details')['message'];
        return $value->{$key} ?? false;
    }

    public static function clean(): void
    {
        session_start();

        $_SESSION =[];

        session_destroy();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_start();
    }

    function __destruct()
    {
        $flashMessages = $_SESSION[self::$FLASH_KEY];
        foreach ($flashMessages as $key => &$flashMessage) {
            if($flashMessage['remove'] === true)
                unset($flashMessages[$key]);
        }
        $_SESSION[self::$FLASH_KEY] = $flashMessages;
    }


}