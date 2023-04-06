<?php

namespace App\Core;

class View
{
    public function renderView($folder, $view, $params = []): array|bool|string
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($folder, $view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function renderContent($viewContent): array|bool|string
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent(): bool|string
    {
        ob_start();
        include_once __DIR__."/../../resource/welcome.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($folder, $view, $params): bool|string
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once __DIR__."/../../resource/$folder/$view.php";
        return ob_get_clean();
    }
}