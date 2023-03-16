<?php

namespace App\Core;

require_once __DIR__ . '/../../vendor/autoload.php';

class App
{
    public static App $app;
    public Router $router;
    public Request $request;
    public Response $response;
    public Controller $controller;
    public Session $session;

    public function __construct()
    {
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
    }

    public static function isGuest()
    {
        return !self::$app->session->get('username');
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