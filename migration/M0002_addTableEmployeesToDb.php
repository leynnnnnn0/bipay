<?php

class M0002_addTableEmployeesToDb
{
    public function up()
    {
        $query = "CREATE TABLE employees (
            id INT AUTO_INCREMENT PRIMARY KEY,
            photo VARCHAR(255),
            firstName VARCHAR(225) NOT NULL,
            middleName VARCHAR(225),
            lastName VARCHAR(225) NOT NULL,
            dateOfBirth DATE NOT NULL,
            streetAddress VARCHAR(255) NOT NULL,
            city VARCHAR(255) NOT NULL,
            state VARCHAR(225) NOT NULL,
            zipCode VARCHAR(4) NOT NULL,
            email VARCHAR(255) NOT NULL,
            phoneNumber VARCHAR(10) NOT NULL
        )";
        $database = app\core\Application::$application->database;
        $statement = $database->pdo->prepare($query);
        $statement->execute();
    }

    public function down()
    {
        $query = "DROP TABLE employees";
        $database = Application::$application->database;
        $statement = $database->pdo->query($query);
        $statement->execute();
    }
}