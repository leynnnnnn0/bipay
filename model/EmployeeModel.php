<?php

namespace app\model;

use app\constant\FormError;
use app\core\DbModel;

class EmployeeModel extends DbModel
{
    public string $photo = '';
    public string $firstName = '';
    public string $middleName = '';
    public string $lastName = '';
    public string $dateOfBirth = '';
    public string $birthMonth = '';
    public string $birthDate = '';
    public string $birthYear = '';
    public string $gender = '';
    public string $streetAddress = '';
    public string $city = '';
    public string $state = '';
    public string $zipCode = '';
    public string $email = '';
    public string $phoneNumber = '';

    public function attributes(): array
    {
        return [
            'photo' => [],
            'firstName' => [FormError::REQUIRED],
            'middleName' => [],
            'lastName' => [FormError::REQUIRED],
            'dateOfBirth' => [FormError::REQUIRED, FormError::VALID_DATE],
            'gender' => [FormError::REQUIRED],
            'streetAddress' => [FormError::REQUIRED],
            'city' => [FormError::REQUIRED],
            'state' => [FormError::REQUIRED],
            'zipCode' => [FormError::REQUIRED],
            'email' => [FormError::REQUIRED, FormError::VALID_EMAIL, [FormError::UNIQUE, 'email' => self::class]],
            'phoneNumber' => [FormError::REQUIRED, FormError::VALID_PHONE_NUMBER]
        ];
    }

    function tableName(): string
    {
        return "employees";
    }
}