<?php

declare(strict_types=1);


ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 900,
    'domain' => 'mysite.local',
    'path' => '/',
    #'secure' => true, - since i made virtual hosts on my local machine, i got an unsafe connection, so im disabling this option for time being 
    'httponly' => true
]);

session_start();
regenerateSessionIdIfConditionsAreMet();


function regenerateSessionIdIfConditionsAreMet(): void
{
    $timeoutInSeconds = 300;
    if (isset($_SESSION["last_regeneration"]) && time() - $_SESSION["last_regeneration"] >= $timeoutInSeconds) {
        regenerateSessionId();
    } else if (!isset($_SESSION["last_regeneration"])) {
        regenerateSessionId();
    }
}

function regenerateSessionId(): void
{
    session_regenerate_id(true);
    $_SESSION["last_regeneration"] = time();
}

function generateSessionForLoggedInUser(int $userId, string $username): void
{
    #this function should run when user has sent correct login data
    session_regenerate_id(true);

    $_SESSION["user_id"] = $userId;
    $_SESSION["user_name"] = htmlspecialchars($username);
    $_SESSION["last_regeneration"] = time();
}
