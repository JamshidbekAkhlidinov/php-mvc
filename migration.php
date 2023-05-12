<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 5 2023 12:9:58
 *   https://github.com/JamshidbekAkhlidinov
 */

echo "Migration run\n";

function dump($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use app\core\Application;

require_once __DIR__ . "/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(__DIR__, $config);
$app->db->applyMigrations();

