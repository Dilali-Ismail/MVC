<?php

use Src\Http\Route;
use Src\Http\Response;
use Src\Http\Request;

session_start();

require_once '../vendor/autoload.php';
require_once '../routes/web.php';

var_dump(Route::$routes['get']['/']());

$route = new Route(new Response , new Request);

$route->resolve();