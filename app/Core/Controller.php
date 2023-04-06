<?php

namespace App\Core;

use App\Core\Middlewares\BaseMiddleware;

class Controller
{
    public string $action = '';
    protected array $middlewares = [];

    public function view($path, $view, $params = []): array|bool|string
    {
        $viewClass = new View();
        return $viewClass->renderView($path, $view, $params);
    }

    public function registerMiddleware(BaseMiddleware $middleware): void
    {
        $this->middlewares[] = $middleware;
    }

    /**
     * @return array
     */
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}