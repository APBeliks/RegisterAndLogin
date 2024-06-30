<?php

declare(strict_types=1);


ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);

session_start();

if (isset($_SESSION["user_id"])) {
    if (!isset($_SESSION["last_regeneration"])) {
        regenerateSessionIdLoggedIn();
    } else {
        $interval = 60 * 30;            #is it more readable then '1800'?
        if (time() - $_SESSION["last_regeneration"] >= $interval) {
            regenerateSessionIdLoggedIn();
        }
    }
} else {
    if (!isset($_SESSION["last_regeneration"])) {
        regenerateSessionId();
    } else {
        $interval = 60 * 30;
        if (time() - $_SESSION["last_regeneration"] >= $interval) {
            regenerateSessionId();
        }
    }
}

function regenerateSessionId(): void
{
    session_regenerate_id(true);
    $_SESSION["last_regeneration"] = time();
}

function regenerateSessionIdLoggedIn(): void
{
    session_regenerate_id(true);

    $userId = $_SESSION["user_id"];
    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $userId;
    session_id($sessionId);

    $_SESSION["last_regeneration"] = time();
}

function generateSessionForLoggedInUser(int $userId, string $username): void
{
    #this function should run when user has sent correct login data
    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $userId;
    session_id($sessionId);

    $_SESSION["user_id"] = $userId;
    $_SESSION["user_name"] = htmlspecialchars($username);
    $_SESSION["last_regeneration"] = time();
}
