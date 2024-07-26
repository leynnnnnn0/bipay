<?php

namespace app\core;

abstract class DbModel extends Model
{
    abstract function tableName(): string;

    public function customQuery($query, $params = [])
    {
        $database = Application::$application->database;
        return $database->query($query, $params);
    }
    public function insertAndSave(): bool
    {
        $tableName = $this->tableName();
        $properties = array_keys($this->attributes());
        $attributes = implode(", ", $properties);
        $values = implode(", ", array_map(fn($value) => ":$value", $properties));
        $query = "INSERT INTO $tableName ($attributes) VALUES ($values)";
        $database = Application::$application->database;
        $statement = $database->pdo->prepare($query);
        foreach ($properties as $property) {
            if($property === 'password')
            {
                $statement->bindValue(":$property", password_hash($this->{$property}, PASSWORD_BCRYPT));
                continue;
            }
            $statement->bindValue(":$property", $this->{$property});
        }
        $statement->execute();
        return $statement->rowCount() > 0;
    }

    public function findById(string $id): array | bool
    {
        $tableName = $this->tableName();
        $query = "SELECT * FROM $tableName WHERE id = :id";
        $database = Application::$application->database;
        $statement = $database->pdo->prepare($query);
        $statement->bindValue(":id", $id);
        $statement->execute();
        return $statement->fetch();
    }

    public function findAllById($id)
    {
        $tableName = $this->tableName();
        $query = "SELECT * FROM $tableName WHERE id = :id";
        $database = Application::$application->database;
        $statement = $database->pdo->prepare($query);
        $statement->bindValue(":id", $id);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function find(string $key, string $value): bool| array
    {
        $tableName = $this->tableName();
        $query = "SELECT * FROM $tableName WHERE $key = :$key";
        $database = Application::$application->database;
        $statement = $database->pdo->prepare($query);
        $statement->bindValue(":$key", $value);
        $statement->execute();
        return $statement->fetch();
    }

    public function fetchAll(): array
    {
        $tableName = $this->tableName();
        $query = "SELECT * FROM $tableName";
        $statement = Application::$application->database->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function removeById(string $id = ''): bool
    {
        $tableName = $this->tableName();
        $query = "DELETE FROM $tableName WHERE id = :id";
        $database = Application::$application->database;
        $statement = $database->pdo->prepare($query);
        if(!empty($id))
            $statement->bindValue(":id", $id);
        if(property_exists($this, 'id'))
            $statement->bindValue(":id", $this->id);
        $statement->execute();
        return $statement->rowCount() > 0;
    }

    public function updateById(string $id = '', $currentImage = '') : bool
    {
        $tableName = $this->tableName();
        $keys = array_keys($this->attributes());
        $values = implode(", ", array_map(fn($value) => "$value = :$value", $keys));
        $query = "UPDATE $tableName SET $values WHERE id = :id";
        $database = Application::$application->database;
        $statement = $database->pdo->prepare($query);
        foreach ($keys as $key) {
            if($key === 'photo')
            {
                if($currentImage !== 'empty.png' && $this->{$key} === 'empty.png')
                {
                    $statement->bindValue(":$key", $currentImage);
                    continue;
                }
            }
            $statement->bindValue(":$key", $this->{$key});
        }
        if(!empty($id))
            $statement->bindValue(":id", $id);
        $statement->execute();
        return $statement->rowCount() > 0;
    }

    public function update(string $id, array $attribute): bool
    {
        $tableName = $this->tableName();
        $keys = array_keys($attribute);
        $attributes = implode(", ", array_map(fn($value) => "$value = :$value", $keys));
        $query = "UPDATE $tableName SET $attributes WHERE leaveId = :id";
        $database = Application::$application->database;
        $statement = $database->pdo->prepare($query);
        foreach ($attribute as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        $statement->bindValue(":id", $id);
        return $statement->execute();
    }

}
