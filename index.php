<?php

declare(strict_types=1);
require_once "BackendLogic/SessionConfig.php";

#To Do - move router logic to router.php
$routes = [
    'GET' =>
    [
        '/' => 'Pages/Home.php',
        '/login' => 'Pages/Login.php',
        '/signup' => 'Pages/Signup.php',
    ],
    'POST' => [
        '/login' => 'BackendLogic/Login.php',
        '/signup' => 'BackendLogic/Signup.php',
        '/logout' => 'BackendLogic/Logout.php'
    ]
];
$endpoint = parse_url($_SERVER['REQUEST_URI'])['path'];
$requestMethod = $_SERVER['REQUEST_METHOD'];
if (isset($routes[$requestMethod][$endpoint])) {
    require_once $routes[$requestMethod][$endpoint];
} else {
    echo "test";
}
