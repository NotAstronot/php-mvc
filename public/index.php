<?php

require __DIR__ . '/../vendor/autoload.php';

use Php\Mvc\App\Router;

Router::add('GET', '/', 'HomeController', 'index');
Router::add('GET', '/login', 'UseController', 'login');
Router::add('GET', '/register', 'UseController', 'register');

Router::run();
