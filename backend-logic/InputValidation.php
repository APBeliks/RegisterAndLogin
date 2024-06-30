<?php

declare(strict_types=1);


function checkSignUpErrors(object $pdo, object $user): array
{
    $errors = [];

    if (isSignUpInputEmpty($user->userName, $user->password, $user->email)) {
        $errors["empty_input"] = "Fill in all fields!";
    }
    if (isEmailInvalid($user->email)) {
        $errors["invalid_email"] = "Given email is not valid";
    }
    if (isUserNameTaken($pdo, $user->userName)) {
        $errors["username_taken"] = "Account with that username alerady exists";
    }
    if (isEmailRegistered($pdo, $user->email)) {
        $errors["email_registered"] = "Account with that email adress already exists";
    }

    return $errors;
}

function checkLoginErrors(object $pdo, object $user): array
{
    $errors = [];

    if (isLoginInputEmpty($user->userName, $user->password,)) {
        $errors["empty_input"] = "Fill in all fields!";
    }
    if (!isUserNameTaken($pdo, $user->userName)) {
        $errors["username_taken"] = "There is no account with that username";
    }
    if (isUserNameTaken($pdo, $user->userName) && isPasswordWrong($pdo, $user->password, $user->userName)) {
        $errors["username_taken"] = "Wrong password";
    }
    return $errors;
}

function isSignUpInputEmpty(string $username, string $password, string $email): bool
{
    if (empty($username) || empty($password) || empty($email)) {
        return true;
    }
    return false;
}

function isLoginInputEmpty(string $username, string $password): bool
{
    if (empty($username) || empty($password)) {
        return true;
    }
    return false;
}

function isEmailInvalid(string $email): bool
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false; #condition is true if email is valid
    }
    return true;
}

function isUserNameTaken(object $pdo, string $username): bool
{
    return (getUserName($pdo, $username)) ? true : false;
}

function isEmailRegistered(object $pdo, string $email): bool
{
    return (getEmail($pdo, $email)) ? true : false;
}

function isPasswordWrong(object $pdo, string $password, string $username): bool
{
    if (!password_verify($password, getUserPassword($pdo, $username))) {
        return true;
    } else {
        return false;
    }
}



#TO DO
#I probably should move those functions some whewre else, since they are querying data from db and not accualy validating anything -,- 

function getUserName(object $pdo, string $username): array
{
    $sql = "SELECT username FROM users WHERE username = :username;";
    $stmt = $pdo->connect()->prepare($sql);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);

    $connection = null;
    $stmt = null;

    return $results;
}

function getEmail(object $pdo, string $email): array
{
    $sql = "SELECT email FROM users WHERE email = :email;";

    $stmt = $pdo->connect()->prepare($sql);

    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);

    $connection = null;
    $stmt = null;

    return $results;
}

function getUserPassword(object $pdo, string $username): string
{
    $sql = "SELECT userPassword FROM users WHERE username = :username;";

    $stmt = $pdo->connect()->prepare($sql);

    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    $connection = null;
    $stmt = null;

    return $results["userPassword"];
}
