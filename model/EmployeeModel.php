<?php

namespace app\model;

use app\constant\FormError;
use app\core\Model;

class EmployeeModel extends Model
{
    public string $photo = '';
    public string $firstName = '';
    public string $middleName = '';
    public string $lastName = '';
    public string $dateOfBirth = '';
    public string $streetAddress = '';
    public string $city = '';
    public string $state = '';
    public string $zipCode = '';
    public string $email = '';
    public string $phoneNumber = '';

    public function loadPhoto($file): void
    {
        $valid = ["jpg", "jpeg", "png"];
        $type = explode('/', $file['photo']['type'])[1];
        if(!in_array($type, $valid)) {
            $this->addError('photo', "Please input a valid photo");
            return;
        }
        $this->photo = $file['photo']['name'];
    }

    public function attributes(): array
    {
        return [
            'photo' => [],
            'firstName' => [FormError::REQUIRED],
            'middleName' => [],
            'lastName' => [FormError::REQUIRED],
            'dateOfBirth' => [FormError::REQUIRED, FormError::VALID_DATE],
            'streetAddress' => [FormError::REQUIRED],
            'city' => [FormError::REQUIRED],
            'state' => [FormError::REQUIRED],
            'zipCode' => [FormError::REQUIRED],
            'email' => [FormError::REQUIRED, FormError::VALID_EMAIL, [FormError::UNIQUE, 'email' => self::class]],
            'phoneNumber' => [FormError::REQUIRED, FormError::VALID_PHONE_NUMBER]
        ];
    }
}