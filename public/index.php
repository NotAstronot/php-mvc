<?php

require __DIR__ . '/../vendor/autoload.php';

use Php\Mvc\App\Router;
use Php\Mvc\Controller\HomeController;
use Php\Mvc\Controller\ProductController;

Router::add('GET', '/products/([0-9a-zA-Z]*)/categories/([0-9a-zA-Z]*)', ProductController::class, 'categories');

Router::add('GET', '/', HomeController::class, 'index');
Router::add('GET', '/hello', HomeController::class, 'hello');
Router::add('GET', '/world', HomeController::class, 'world');
Router::add('GET', '/about', HomeController::class, 'about');


Router::run();
