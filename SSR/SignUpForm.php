<?php

declare(strict_types=1);

function signUpUserNameInput(): void
{
    if (isset($_SESSION["signup_data"]["username"])) {
        echo '<input type="text" class="form-control" id="userName" name="username" aria-describedby="userNameHelp" value="' . $_SESSION["signup_data"]["username"] . '">';
    } else {
        echo '<input type="text" class="form-control" id="userName" name="username" aria-describedby="userNameHelp">';
    }
}

function signUpEmailInput(): void
{
    if (isset($_SESSION["signup_data"]["email"])) {
        echo '<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="' . $_SESSION["signup_data"]["email"] . '">';
    } else {
        echo '<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">';
    }
}

function signUpPasswordInput(): void
{
    echo '<input type="password" class="form-control" id="password" name="password" aria-describedby="passwordHelp">';
}

function signUpRepeatPasswordInput(): void
{
    echo '<input type="password" class="form-control" id="repeatPassword" name="repeatPassword" aria-describedby="repeatPasswordHelp">';
}

function displayErrors(): void
{
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];
        echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error . '</p>';
        }

        unset($_SESSION['errors_signup']);
    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo "<br>";
        echo '<p class="success-msg">Signup success!</p>';
    }
}
