<?php
/*
 *   Jamshidbek Akhlidinov
 *   4 - 5 2023 12:54:40
 *   https://github.com/JamshidbekAkhlidinov
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


use app\controllers\AuthController;
use app\core\Application;
use app\controllers\SiteController;

require_once "../vendor/autoload.php";

$app = new Application(dirname(__DIR__));

$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/about', [SiteController::class, 'about']);

$app->router->post('/', function () {
    return "This is post method";
});

$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);


$app->router->get('/auth/login', [AuthController::class, 'login']);
$app->router->post('/auth/login', [AuthController::class, 'handleLogin']);

$app->router->get('/auth/register', [AuthController::class, 'register']);
$app->router->post('/auth/register', [AuthController::class, 'handleRegister']);

$app->run();

?>

