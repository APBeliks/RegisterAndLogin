<?php

declare(strict_types=1);

namespace RegisterAndLogin;

use PDOStatement;

require_once "DTO/User.php";
require_once "DBHandler.php";
require_once "InputValidation.php";


#use RegisterAndLogin\User;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = getUserData();
    $pdo = new DBHandler;
    $errors = checkSignUpErrors($pdo, $user);

    if ($errors) {
        $_SESSION["errors_signup"] = $errors;
        #Sending email and username back to input, so user will not need to retype those :)
        $signupData = [
            "username" => $user->userName,
            "email" => $user->email
        ];
        $_SESSION["signup_data"] = $signupData;
        header("Location: /signup");
    } else {
        createUser($pdo, $user);
        header("Location: /signup?signup=success");
    }
} else {
    header("Location: /");
}


function createUser(object $pdo, User $user): void
{
    try {
        $connection = $pdo->connect();

        $sql = "INSERT INTO users (userName, userPassword, email) VALUES (:userName, :userPassword, :email);";
        $stmt = $connection->prepare($sql);

        $stmt->bindParam(":userName", $user->userName);
        $stmt->bindParam(":userPassword", $user->password);
        $stmt->bindParam(":email", $user->email);

        $stmt->execute();

        $connection = null;
        $stmt = null;
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}


function getUserData(): User
{
    $user = new User;
    $user->userName = $_POST["username"];
    $user->email = $_POST["email"];
    $user->password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    return $user;
}
