<?php
/*
 *   Jamshidbek Akhlidinov
 *   4 - 5 2023 11:52:45
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\core;

class Application
{
    public static string $ROOT_DIR;
    public static Application $application;
    public Router $router;
    public Request $request;
    public Response $response;


    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$application = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run()
    {
        echo  $this->router->resolve();
    }
}