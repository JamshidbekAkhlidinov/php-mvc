<?php
/*
 *   Jamshidbek Akhlidinov
 *   4 - 5 2023 11:52:45
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\core;

class Application
{
    public Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }
}