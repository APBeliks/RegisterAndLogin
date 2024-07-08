<?php

declare(strict_types=1);
require_once "BackendLogic/SessionConfig.php";


function isLoggedIn(): bool
{
    return isset($_SESSION["user_id"]);
}

function displayWelcomeMsg(): void
{
    if (isLoggedIn()) {
        echo '<h1 class="text-center">Welcome back ' . $_SESSION["user_name"] . '</h1>';
    } else {
        echo '<h1 class="text-center">Welcome, you are not logged in</h1>';
        echo '<p>Please login or create account</p>';
    }
}

function displayButtons(): void
{
    if (isLoggedIn()) {
        echo '<form action="/logout" method="post" class="mx-auto align-middle">
                 <button type="submit" class="btn btn-primary">Logout</button>
            </form>';
    } else {
        echo '<form class="mx-auto align-middle">
                <a class="btn btn-secondary" href="signup" role="button">Create Account</a>
                <a class="btn btn-primary" href="login" role="button">Login</button>
              </form>';
    }
}
