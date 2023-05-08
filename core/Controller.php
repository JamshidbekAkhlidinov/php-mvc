<?php
/*
 *   Jamshidbek Akhlidinov
 *   4 - 5 2023 19:13:32
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\core;

class Controller
{
    public string $layout = 'main';

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function render($view, $params = [])
    {
        return Application::$application->router->renderView($view, $params);
    }
}