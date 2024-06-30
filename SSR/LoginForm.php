<?php

declare(strict_types=1);
require_once "backend-logic/SessionConfig.php";

function loginUserNameInput(): void
{
    if (isset($_SESSION["login_data"]["username"])) {
        echo '<input type="text" class="form-control" id="userName" name="username" aria-describedby="userNameHelp" required value="' . $_SESSION["login_data"]["username"] . '">';
    } else {
        echo '<input type="text" class="form-control" id="userName" name="username" aria-describedby="userNameHelp" autofocus required>';
    }
}



function displayLoginErrors()
{
    if (isset($_SESSION["errors_login"])) {
        $errors = $_SESSION["errors_login"];
        echo "<br>";
        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error . '</p>';
        }
        unset($_SESSION["errors_login"]);
    }
}
