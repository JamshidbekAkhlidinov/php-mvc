<?php
/*
 *   Jamshidbek Akhlidinov
 *   6 - 5 2023 12:14:38
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\controllers;

use app\core\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return $this->render('auth/login');
    }

    public function handleLogin()
    {
        return "saved";
    }

    public function register()
    {
        return $this->render('auth/register');
    }

    public function handleRegister()
    {
        return "saved";
    }


}