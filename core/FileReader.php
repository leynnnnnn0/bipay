<?php

namespace app\core;

class FileReader
{
    // This function returns an associative array o
    public static function readAndExplode($filename) : array
    {
        $userData = [
            'firstName' => '',
            'middleName' => '',
            'lastName' => '',
            'birthMonth' => '',
            'birthDate' => '',
            'birthYear' => '',
            'gender' => '',
            'streetAddress' => '',
            'city' => '',
            'state' => '',
            'zipCode' => '',
            'email' => '',
            'phoneNumber' => '',
        ];
        $values = [];
        $file = fopen($filename, 'r');
        while(($line = fgets($file)) !== false)
        {
            $value = explode(":", $line);
            $values[] = trim($value[1]);
        }
        $index = 0;
        foreach($userData as $key => &$value)
        {
            $value = $values[$index];
            $index++;
        }
        fclose($file);
        return $userData;
    }
}