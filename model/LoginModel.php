<?php

namespace app\model;

use app\constant\FormError;
use app\core\Validator;

class LoginModel extends Validator
{
    public string $email = '';
    public string $password = '';
    function tableName(): string
    {
        return 'accounts';
    }

    public function attributes(): array
    {
        return [
          'email' => [FormError::REQUIRED, [FormError::REGISTERED, 'class' => self::class]],
          'password' => [FormError::REQUIRED],
        ];
    }
}