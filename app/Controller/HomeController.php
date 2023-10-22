<?php

namespace Php\Mvc\Controller;

use Php\Mvc\App\View;

class HomeController
{
    function index(): void
    {
        View::render('Home/index', [
            "title" => "PHP Login Manajement"
        ]);
    }
}
