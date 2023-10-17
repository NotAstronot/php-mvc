<?php

namespace Php\Mvc\Middleware;

interface Middleware
{

    function before(): void;
}
