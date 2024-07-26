<?php

namespace app\core;

use app\constant\FormError;

abstract class Validator extends DbModel
{
    public function authenticate($email, $password): bool
    {
        $result = $this->find('email', $email);
        if(!password_verify($password, $result['password']))
        {
            $this->addError('password', 'Incorrect Password');
            return false;
        }
        Session::set('email', $result['email']);
        return true;
    }

    public function required(string $key, string $value, string $error) : void
    {
        if($error == FormError::REQUIRED && empty($value))
            $this->addError($key, "This field is required");
    }
    public function number(string $key, string $value, string $error) : void
    {
        if($error == FormError::NUMBER && !is_numeric($value))
            $this->addError($key, "This field must be a number");
    }

    public function phoneNumber(string $key, string $value, string $error) : void
    {
        if($error == FormError::VALID_PHONE_NUMBER)
            if(!is_numeric($value) || strlen($value) != 10)
                $this->addError($key, "Please input a valid phone number");
    }

    public function email(string $key, string $value, string $error) : void
    {
        if($error == FormError::VALID_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL))
            $this->addError($key, "Please input a valid email address");
    }

    public function min(string $key, string $value, string $error, $temp) : void
    {
        if($error == FormError::MIN && strlen($value) < $temp['min'])
            $this->addError($key, "$key should contain at least $temp[min] characters.");
    }

    public function registered(string $key, string $value, string $error, $temp) : void
    {
        if($error == FormError::REGISTERED)
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