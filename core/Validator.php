<?php

namespace app\core;

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
}