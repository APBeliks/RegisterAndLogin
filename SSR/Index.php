<?php

declare(strict_types=1);
require_once "backend-logic/SessionConfig.php";


function isLoggedIn(): bool
{
    return isset($_SESSION["user_id"]) ? true : false;
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
        echo '<form action="backend-logic/Logout.php" method="post" class="mx-auto align-middle">
                 <button type="submit" class="btn btn-primary">Logout</button>
            </form>';
    } else {
        echo '<form class="mx-auto align-middle">
                <a class="btn btn-secondary" href="signup.php" role="button">Create Account</a>
                <a class="btn btn-primary" href="login.php" role="button">Login</button>
              </form>';
    }
}
