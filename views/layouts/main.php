<?php

use app\core\Application;

/**
 * @var $this app\core\View
 */

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$this->title?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
            </ul>
            <span class="navbar-text">
                   <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if (Application::isGust()): ?>
                        <li class="nav-item">
                        <a class="nav-link" href="/auth/login">Login</a>
                    </li>
                        <li class="nav-item">
                        <a class="nav-link" href="/auth/register">Sign Up</a>
                    </li>
                    <?php else: ?>
                        <li class="nav-item">
                        <a class="nav-link" href="/auth/profile">
                            Profile
                        </a>
                    </li>
                        <li class="nav-item">
                        <a class="nav-link" href="/auth/logout">
                            <?= Application::$app->user->getName() ?> (Logout)
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
                </span>
        </div>
    </div>
</nav>

<div class="container">
    <?php if (Application::$app->session->getFlash('success')): ?>
        <div class="alert alert-success">
            <?= Application::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>
    {{content}}

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>