<?php

namespace app\model;

use app\core\DbModel;

class LoginModel extends DbModel
{

    function tableName(): string
    {
        return 'accounts';
    }

    public function attributes(): array
    {
        return [
          'email' => [],
          'password' => [],
        ];
    }
}