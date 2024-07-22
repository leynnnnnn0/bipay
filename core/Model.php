<?php

namespace app\core;

use app\constant\FormError;

abstract class Model
{
    public array $errors = [];
    abstract public function attributes(): array;
    public function loadData($data, $file = []) : void
    {
        foreach($data as $key => $value) {
            if(property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
        if(property_exists($this, 'dateOfBirth'))
        {
            $dateOfBirth = "$this->birthYear/$this->birthMonth/$this->birthDate";
            $this->dateOfBirth = date("Y-m-d", strtotime($dateOfBirth));
        }
        if(!empty($file['photo']['name'])) {
            $valid = ["jpg", "jpeg", "png"];
            $type = explode('/', $file['photo']['type'])[1];
            if(!in_array($type, $valid)) {
                $this->addError('photo', "Please input a valid photo");
                return;
            }
            if(property_exists($this, 'photo'))
            {
                $this->photo = $file['photo']['name'];
            }
            $photoName = $file['photo']['name'];
            Image::create($file['photo'], Application::$ROOT_PATH . "/public/avatar/$photoName");
        }
    }


    public function validate($existing = []): bool
    {
        extract($existing);
        foreach($this->attributes() as $key => $errors)
        {
            $value = $this->{$key};
            foreach($errors as $error) {
                $temp = $error;
                if(is_array($error)) $error = $error[0];
                if($error === FormError::REQUIRED && empty($value))
                    $this->addError($key, "This field is required");

                if($error === FormError::NUMBER && !is_numeric($value))
                    $this->addError($key, "This field must be a number");

                if($error === FormError::VALID_PHONE_NUMBER)
                    if(!is_numeric($value) || strlen($value) != 10)
                        $this->addError($key, "Please input a valid phone number");

                if($error === FormError::VALID_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL))
                    $this->addError($key, "Please input a valid email address");

                if($error === FormError::UNIQUE)
                {
                    if(Request::customMethod() === 'PUT' && $key === 'email')
                        if($email === $value) continue;
                    $instance = new $temp['class'];
                    $result = $instance->find($key, $value);
                    if($result) $this->addError($key, "This $key has been already used.");
                }

                if($error === FormError::MIN && strlen($value) < $temp['min'])
                    $this->addError($key, "$key should contain at least $temp[min] characters.");

                if($error === FormError::REGISTERED)
                {
                    $instance = new $temp['class'];
                    $result = $instance->find($key, $value);
                    if(!$result)
                    {
                        $this->addError($key, ucfirst($key) . " is not recognized. Please use your work email.");
                    }

                }
            }
        }
        return empty($this->errors);
    }


    public function addError(string $key, string $message): void
    {
        $this->errors[$key][] = $message;
    }



}