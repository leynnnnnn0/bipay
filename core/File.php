<?php

namespace app\core;

class File
{
    public static function create(array $file, string $path): bool
    {
        return move_uploaded_file($file['tmp_name'], $path);
    }

    public static function download($fileName)
    {
        $file_path = Application::$ROOT_PATH . "/public/attachment/$fileName";
        // Check if file exists
        if (file_exists($file_path)) {
            // Set headers
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
            header('Content-Length: ' . filesize($file_path));

            // Output file contents
            readfile($file_path);
            exit;
        } else {
            echo "File not found.";
        }
    }

    public static function remove(string $image, string $path): bool
    {
        return unlink("$path/$image");
    }
}