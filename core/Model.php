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
        if(!empty($file)) {
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
        }
    }


    public function validate(): bool
    {
        foreach($this->attributes() as $key => $errors)
        {
            $value = $this->{$key};
            foreach($errors as $error) {
                if(is_array($error)) $error = $error[0];
                if($error === FormError::REQUIRED && empty($value))
                    $this->addError($key, "This field is required");
//                || !preg_match('/^9{10}$/', $value)
                if($error === FormError::VALID_PHONE_NUMBER)
                    if(!is_numeric($value))
                        $this->addError($key, "Please input a valid phone number");

                if($error === FormError::VALID_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL))
                    $this->addError($key, "Please input a valid email address");
            }
        }
        return empty($this->errors);
    }


    public function addError(string $key, string $message): void
    {
        $this->errors[$key][] = $message;
    }



}