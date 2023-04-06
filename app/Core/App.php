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
        $this->session = new Session();
        $this->request = new Request();
        $this->router = new Router($this->request);
        $this->response = new Response($this->request, $this->router);
    }

    public static function isGuest(): bool
    {
        return !self::$app->session->get('username');
    }

    public function run(): void
    {
        echo $this->response->send();
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