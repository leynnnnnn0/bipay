<?php

namespace app\core;

class Image
{
    public static function create(array $file, string $path): bool
    {
        return move_uploaded_file($file['tmp_name'], $path);
    }

    public static function remove(string $image, string $path): bool
    {
        if($image === 'empty.png') return false;
        return unlink("$path/$image");
    }

    public static function update(string $current, array $file, string $path) : void
    {
        if($current === 'empty.png' && empty($file['name']) || $current !== 'empty.png' && empty($file['name'])) return;
        self::remove($current, $path);
        self::create($file, $path);
    }
}

//For updating user attachment with no existing photo like an empty photo which is the default
// if current photo is equals to empty.png then do nothing
// if there is a current photo, and you don't want to update it
// If there is a current photo and this->photo is equals to empty.png then do nothing

// If there is current a photo, and you want to update it
// If there is a current photo and new photo is not equals to empty.png then create a photo and delete the existing one


