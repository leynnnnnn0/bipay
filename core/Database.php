<?php

namespace app\core;

use PDO;

class
Database
{
    public PDO $pdo;

    function __construct(array $config)
    {
        $dsn = $config['dsn'];
        $user = $config['user'];
        $password = $config['password'];
        $this->pdo = new PDO($dsn, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function query(string $query, array $params = []): bool|\PDOStatement
    {
        $statement = $this->pdo->prepare($query);
        $statement->execute($params);
        return $statement;
    }

    public function initializeMigration(): void
    {
        $this->createMigrationTable();
        $appliedMigrations = $this->getAppliedMigrations();
        $migrations = scandir(Application::$ROOT_PATH . "/migration");
        $migrationsToApply = array_diff($migrations, $appliedMigrations);
        $migrationsList = [];
        foreach ($migrationsToApply as $migration) {
            if($migration === '.' || $migration === '..') continue;
            require_once Application::$ROOT_PATH . "/migration/" . $migration;
            $fileName = pathinfo($migration, PATHINFO_FILENAME);
            $instance = new $fileName();
            $this->log("Applying migration $fileName");
            $instance->up();
            $this->log("$fileName applied");
            $migrationsList[] = $migration;
        }
        if(empty($migrationsList))
        {
            $this->log("No migration to apply.");
            return;
        }
        $this->insertMigrations($migrationsList);
        $this->log("Migrations applied");
    }

     public function createMigrationTable(): void
     {
         $query = "CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255) NOT NULL UNIQUE,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";
         $statement = $this->pdo->prepare($query);
         $statement->execute();
     }

     public function getAppliedMigrations(): bool|array
     {
         $query = "SELECT migration FROM migrations";
         $statement = $this->pdo->prepare($query);
         $statement->execute();
         return $statement->fetchAll(PDO::FETCH_COLUMN);
     }

     public function insertMigrations($migrations): void
     {
         $values = implode(",", array_map(fn($item) => "('$item')", $migrations));
         $query = "INSERT INTO migrations (migration) VALUES $values";
         $statement = $this->pdo->prepare($query);
         $statement->execute();
     }

     public function log($message): void
     {
         echo $message . PHP_EOL;
     }
}