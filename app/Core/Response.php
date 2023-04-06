<?php

namespace App\Core;

class Response
{
    public Request $request;
    public Router $router;

    public function __construct(Request $request, Router $router)
    {
        $this->request = $request;
        $this->router = $router;
    }

    public function send()
    {
        $path = $this->request->getUrl();
        $method = $this->request->getMethod();
        $callback = $this->router->routeMap[$method][$path] ?? false;
        if (!$callback) {

            $callback = $this->router->getCallback();

            if ($callback === false) {
                throw new \Exception('404 Not found');
            }
        }
        if (is_string($callback)){
            $view = new View();
            return $view->renderView($path, $callback);
        }
        if(is_array($callback)) {
            /** @var Controller $controller */
            $controller = new $callback[0];
            App::$app->controller = $controller;
            $controller->action = $callback[1];
            $callback[0] = App::$app->controller;
            foreach ($controller->getMiddlewares() as $middleware) {
                $middleware->execute();
            }
        }
        return call_user_func($callback, $this->request);
    }

    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }

    public function redirect(string $url)
    {
        header("Location: ".$url);
    }
}