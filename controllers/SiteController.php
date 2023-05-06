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
    public static function home()
    {
        $data = [
            'name'=>"CoderBek2003_1",
        ];
        return self::render('home',$data);
    }

    public static function contact()
    {
        return self::render('contact');
    }

    public static function about()
    {
        return self::render('about');
    }

}