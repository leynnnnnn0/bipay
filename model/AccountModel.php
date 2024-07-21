<?php

namespace app\model;

use app\constant\FormError;
use app\core\DbModel;

class AccountModel extends DbModel
{
    public string $email;
    public string $username;
    public string $password;
    function tableName(): string
    {
        return 'accounts';
    }

    public function attributes(): array
    {
        return [
            'email' => [FormError::REQUIRED, FormError::VALID_EMAIL, [FormError::REGISTERED, 'class' => EmployeeModel::class]],
            'username' => [FormError::REQUIRED],
            'password' => [FormError::REQUIRED, [FormError::MIN, 'min' => 8]],
        ];
    }
}