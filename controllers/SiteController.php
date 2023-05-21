<?php
/*
 *   Jamshidbek Akhlidinov
 *   4 - 5 2023 19:13:22
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\controllers;

use akhlidinov\phpmvc\Application;
use akhlidinov\phpmvc\Controller;
use akhlidinov\phpmvc\Request;
use akhlidinov\phpmvc\Response;
use app\model\ContactForm;

class SiteController extends Controller
{
    public function home()
    {
        $data = [
            'name' => "CoderBek2003_1",
        ];
        return $this->render('home', $data);
    }

    public function contact(Request $request, Response $response)
    {
        $form = new ContactForm();
        if ($request->isPost()) {
            $form->loadData($request->getBody());
            if ($form->validate() && $form->save()) {
                Application::$app->session->setFlash('success', "Send Messages");
                $response->redirect('/');
            }
        }

        return $this->render('contact', [
            'model' => $form,
        ]);
    }

    public function about()
    {
        return $this->render('about');
    }

}