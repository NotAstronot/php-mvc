<?php

namespace Php\Mvc\App;

class View
{
    public static function render(string $view, $model)
    {
        require __DIR__ . '/../View/' . $view . '.php';
    }
}
