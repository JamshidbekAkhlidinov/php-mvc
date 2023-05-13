<?php
/*
 *   Jamshidbek Akhlidinov
 *   6 - 5 2023 12:14:38
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\model\User;

class AuthController extends Controller
{
    public function login(Request $request = null)
    {
        $this->setLayout('auth');

        if ($request != null && $request->isPost()) {
            return "User login";
        }
        return $this->render('auth/login');
    }

    public function register(Request $request)
    {
        $this->setLayout('auth');

        $user = new User();
        if ($request->isPost()) {
            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                Application::$application->session->setFlash('success', "Your success registration");
                Application::$application->response->redirect('/');
            }
            return $this->render('auth/register', [
                'model' => $user,
            ]);
        }
        return $this->render('auth/register', [
            'model' => $user,
        ]);
    }


}