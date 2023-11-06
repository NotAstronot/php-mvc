<?php

namespace Php\Mvc\Controller;

use Php\Mvc\App\View;
use Php\Mvc\Exception\ValidationExeption;
use Php\Mvc\Repository\UserRepository;
use Php\Mvc\Service\UserService;
use Php\Mvc\Config\Database;


class UserController
{

    private UserService $userService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $userRepository = new UserRepository($connection);
        $this->userService = new UserService($userRepository);
    }

    public function register()
    {
        View::render('User/register', [
            'title' => 'Register new user'

        ]);
    }

    public function postRegister()
    {
        $request = new UserRegisterRequest();
        $request->id = $_POST['id'];
        $request->name = $_POST['name'];
        $request->password = $_POST['password'];

        try {
            $this->userService->register($request);
            // Jika sukses diarahkan ke login
        } catch (ValidationExeption $exception) {
            View::render('User/register', [
                'title' => 'Register new user',
                'error' => $exception->getMessage()
            ]);
        }
    }
}
