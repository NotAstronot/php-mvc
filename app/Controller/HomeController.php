<?php

namespace Php\Mvc\Controller;

use Php\Mvc\App\View;

class HomeController
{
    function index(): void
    {
        $model = [
            "title" => "Home",
            "content" => "Selamat datang di PHP Mvc",
        ];

        View::render('Home/index', $model);
    }

    function hello(): void
    {
        echo "HomeController.hello()";
    }

    function world(): void
    {
        echo "HomeController.world()";
    }

    function about(): void
    {
        echo "Not Astronot Boys";
    }

    function login(): void
    {
        $request = [
            "username" => $_POST['username'],
            "password" => $_POST['password'],
        ];

        $user = [];

        $response = [
            "Message" => "Login Success"
        ];
        // Kirimkan response ke Views
    }
}
