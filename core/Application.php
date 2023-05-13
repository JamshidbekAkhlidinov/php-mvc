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
    public Controller $controller;
    public Session $session;

    public Database $db;

    public function __construct($rootPath, $config)
    {
        self::$ROOT_DIR = $rootPath;
        self::$application = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']);
    }

    public function run()
    {
        echo $this->router->resolve();
    }

    /**
     * @return Controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }

    /**
     * @param Controller $controller
     */
    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }

}