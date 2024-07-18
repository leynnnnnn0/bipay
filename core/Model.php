<?php

namespace app\core;

use app\constant\FormError;

abstract class Model
{
    public array $errors = [];
    abstract public function attributes(): array;
    public function loadData($data) : void
    {
        foreach($data as $key => $value) {
            if(property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    public function validate()
    {
        foreach($this->attributes() as $key => $errors)
        {
            $value = $this->{$key};
            foreach($errors as $error) {
                if(is_array($error)) $error = $error[0];
                if($error === FormError::REQUIRED && empty($value))
                    $this->addError($key, "This field is required");

                if($error === FormError::VALID_PHONE_NUMBER)
                    if(!is_numeric($value) || !preg_match('/^9{10}$/', $value))
                        $this->addError($key, "Please input a valid phone number");

                if($error === FormError::VALID_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL))
                    $this->addError($key, "Please input a valid email address");
            }
        }
        return empty($this->errors);
    }


    public function addError(string $key, string $message)
    {
        $this->errors[$key][] = $message;
    }


}