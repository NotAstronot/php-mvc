<?php

require __DIR__ . '/../vendor/autoload.php';

use Php\Mvc\App\Router;
use Php\Mvc\Controller\HomeController;
use Php\Mvc\Controller\UserController;


// Home controller
Router::add('GET', '/', HomeController::class, 'index', []);

// User controller
Router::add('GET', '/users/register', UserController::class, 'register', []);
Router::add('POST', '/users/register', UserController::class, 'postRegister', []);



Router::run();
