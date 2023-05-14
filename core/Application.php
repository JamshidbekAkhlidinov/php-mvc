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

    public string $layout = 'main';

    public static Application $application;
    public Router $router;
    public Request $request;
    public Response $response;
    public ?Controller $controller = null;
    public Session $session;
    public Database $db;

    public ?DbModel $user;

    public string $userClass;

    public function __construct($rootPath, $config)
    {
        self::$ROOT_DIR = $rootPath;
        self::$application = $this;
        $this->userClass = $config['userClass'];
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']);

        $primaryValue = $this->session->get('user');
        if ($primaryValue) {
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
        } else {
            $this->user = null;
        }
    }

    public function run()
    {
        try {
            echo $this->router->resolve();
        } catch (\Exception $exception) {
            Application::$application
                ->response
                ->setStatusCode($exception->getCode());
            echo $this->router->renderView('error', [
                'exception' => $exception
            ]);
        }
    }

    public static function isGust()
    {
        return !self::$application->user;
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

    public function login(DbModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);
        return true;
    }


    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }

}