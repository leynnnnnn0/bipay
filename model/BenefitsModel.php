<?php

namespace app\model;

use app\constant\FormError;
use app\core\DbModel;

class BenefitsModel extends DbModel
{
    public string $sickLeave = '7';
    public string $paidLeave = '7';
    function tableName(): string
    {
        return 'benefits';
    }

    public function attributes(): array
    {
        return [
          'sickLeave' => [FormError::REQUIRED],
          'paidLeave' => [FormError::REQUIRED],
        ];
    }
}