<?php
/*
 *   Jamshidbek Akhlidinov
 *   4 - 5 2023 19:13:22
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\controllers;

use app\core\Controller;

class SiteController extends Controller
{
    public  function home()
    {
        $data = [
            'name'=>"CoderBek2003_1",
        ];
        return $this->render('home',$data);
    }

    public  function contact()
    {
        return $this->render('contact');
    }

    public  function handleContact()
    {
        return $this->render('save');
    }
    public  function about()
    {
        return $this->render('about');
    }

}