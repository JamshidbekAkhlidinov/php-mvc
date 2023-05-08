<?php
/*
 *   Jamshidbek Akhlidinov
 *   6 - 5 2023 12:14:38
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

class AuthController extends Controller
{
    public function login(Request $request = null)
    {
        if ($request != null && $request->isPost()) {
            return "User login";
        }
        $this->setLayout('auth');
        return $this->render('auth/login');
    }

    public function register(Request $request)
    {
        if ($request->isPost()) {
            return "User registered";
        }
        $this->setLayout('auth');
        return $this->render('auth/register');
    }


}