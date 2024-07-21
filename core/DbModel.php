<?php

namespace app\core;

abstract class DbModel extends Model
{
    abstract function tableName(): string;

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
            $statement->bindValue(":$property", $this->{$property});
        }
        $statement->execute();
        return $statement->rowCount() > 0;
    }

    public function fetchById(string $id): array
    {
        $tableName = $this->tableName();
        $query = "SELECT * FROM $tableName WHERE id = :id";
        $database = Application::$application->database;
        $statement = $database->pdo->prepare($query);
        $statement->bindValue(":id", $id);
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

    public function removeById(string $id): bool
    {
        $tableName = $this->tableName();
        $query = "DELETE FROM $tableName WHERE id = :id";
        $database = Application::$application->database;
        $statement = $database->pdo->prepare($query);
        $statement->bindValue(":id", $id);
        $statement->execute();
        return $statement->rowCount() > 0;
    }

    public function updateById(string $id, array $attributes, $currentImage) : bool
    {
        $tableName = $this->tableName();
        $keys = array_keys($attributes);
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
        $statement->bindValue(":id", $id);
        $statement->execute();
        return $statement->rowCount() > 0;
    }
}

// If the current image is not equals to empty.png and new photo is equals to empty.png
// photo = current image