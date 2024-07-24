<?php

namespace app\model;


use app\core\DbModel;

class EmployeeInformationModel extends DbModel
{
    public string $id = '';
    public string $photo = '';
    public string $firstName = '';
    public string $middleName = '';
    public string $lastName = '';
    public string $dateOfBirth = '';
    public string $gender = '';
    public string $streetAddress = '';
    public string $city = '';
    public string $state = '';
    public string $zipCode = '';
    public string $email = '';
    public string $phoneNumber = '';
    public string $status = '';
    public string $joiningDate = '';
    public string $department = '';
    public string $role = '';
    public string $username = '';
    public string $password = '';
    public string $sickLeave = '';
    public string $paidLeave = '';

    /**
     * @return string
     */
    public function getSickLeave(): string
    {
        return $this->sickLeave;
    }

    /**
     * @return string
     */
    public function getPaidLeave(): string
    {
        return $this->paidLeave;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getPhoto(): string
    {
        return $this->photo;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getMiddleName(): string
    {
        return $this->middleName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getDateOfBirth(): string
    {
        return $this->dateOfBirth;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @return string
     */
    public function getStreetAddress(): string
    {
        return $this->streetAddress;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @return string
     */
    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getJoiningDate(): string
    {
        return $this->joiningDate;
    }

    /**
     * @return string
     */
    public function getDepartment(): string
    {
        return $this->department;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }




    public function getPrimaryKey(): string
    {
        return 'email';
    }

    public function attributes(): array
    {
        return [
            'id',
            'photo',
            'firstname',
            'middleName',
            'lastName',
            'dateOfBirth',
            'gender',
            'streetAddress',
            'city',
            'state',
            'zipCode',
            'email',
            'phoneNumber',
            'status',
            'joiningDate',
            'department',
            'role',
            'username',
            'password',
            'sickLeave',
            'paidLeave',
        ];
    }


    function tableName(): string
    {
        return 'employees';
    }
}