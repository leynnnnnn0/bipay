<?php

namespace app\model;

use app\constant\FormError;
use app\core\DbModel;

class BenefitsModel extends DbModel
{
    public string $id = '';
    public string $sickLeave = '0';
    public string $paidLeave = '0';
    function tableName(): string
    {
        return 'benefits';
    }

    public function attributes(): array
    {
        return [
          'sickLeave' => [FormError::REQUIRED],
          'paidLeave' => [FormError::REQUIRED],
            'id' => [FormError::REQUIRED],
        ];
    }
}