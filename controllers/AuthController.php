<?php
/*
*   Jamshidbek Akhlidinov
*   6 - 5 2023 12:14:38
*   https://github.com/JamshidbekAkhlidinov
*/

namespace app\controllers;

use akhlidinov\phpmvc\Application;
use akhlidinov\phpmvc\Controller;
use akhlidinov\phpmvc\middlewares\AuthMiddleware;
use akhlidinov\phpmvc\Request;
use akhlidinov\phpmvc\Response;
use app\model\LoginForm;
use app\model\User;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->registerMiddlewares(new AuthMiddleware(['profile']));
    }

    public function login(Request $request, Response $response)
    {
        $this->setLayout('auth');
        $model = new LoginForm();

        if ($request->isPost()) {
            $model->loadData($request->getBody());
            if ($model->validate() && $model->save()) {
                $response->redirect('/');
            }
        }
        return $this->render('auth/login', [
            'model' => $model,
        ]);
    }

    public function register(Request $request)
    {
        $this->setLayout('auth');

        $user = new User();
        if ($request->isPost()) {
            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', "Your success registration");
                Application::$app->response->redirect('/');
            }
            return $this->render('auth/register', [
                'model' => $user,
            ]);
        }
        return $this->render('auth/register', [
            'model' => $user,
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function profile(Request $request, Response $response)
    {
        return $this->render('auth/profile');
    }


}