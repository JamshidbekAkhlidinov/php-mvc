<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 5 2023 11:19:48
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\core;
class Database
{
    public \PDO $pdo;

    public function __construct(array $db)
    {
        $dsn = $db['dsn'] ?? '';
        $user = $db['user'] ?? '';
        $password = $db['password'] ?? '';
        $this->pdo = new \PDO($dsn, $user, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function applyMigrations()
    {
        $this->createMigrationTable();
        $appliedMigration = $this->getApplicationMigrations();
        $files = scandir(Application::$ROOT_DIR . "/migrations");
        $toApplyMigration = array_diff($files, $appliedMigration);

        dump($toApplyMigration);
    }

    public function createMigrationTable()
    {
        $this->pdo->exec("
            CREATE TABLE IF NOT EXISTS migrations (
                id INT AUTO_INCREMENT PRIMARY KEY,
                migration VARCHAR(255),
                crated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP                                                 
            ) ENGINE=INNODB;
        ");
    }

    public function getApplicationMigrations()
    {
        $statement = $this->pdo->prepare("SELECT migration FROM migrations");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }
}