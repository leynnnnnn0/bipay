<?php

namespace app\core;

class Image
{
    public static function create(array $file, string $path): bool
    {
        return move_uploaded_file($file['tmp_name'], $path);
    }

    public static function remove(string $path): bool
    {
        return unlink($path);
    }
}