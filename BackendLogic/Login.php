<?php

declare(strict_types=1);

namespace RegisterAndLogin;

use PDOStatement;

require_once "DTO/User.php";
require_once "DBHandler.php";
require_once "SessionConfig.php";
require_once "InputValidation.php";

#use RegisterAndLogin\User;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = getLoginUserData();
    $pdo = new DBHandler;
    $currentUser = getUserDbData($pdo, $user->userName);
    $errors = checkLoginErrors($pdo, $user);
    if ($errors) {
        $_SESSION["errors_login"] = $errors;
        $loginData = [
            "username" => $user->userName
        ];
        $_SESSION["login_data"] = $loginData;
        header("Location: /login");
        exit();
    } else {
        generateSessionForLoggedInUser($currentUser->id, $currentUser->userName);
        header("Location: /?login=success");
        exit();
    }
} else {
    header("Location: /");
    exit();
}

function getLoginUserData(): User
{
    $User = new User;
    $User->userName = $_POST["username"];
    $User->password = $_POST["password"];
    return $User;
}


#TO DO - move this function to appropriate file
function getUserDbData(object $pdo, string $username): User
{
    $sql = "SELECT * FROM users WHERE username = :username;";

    $stmt = $pdo->connect()->prepare($sql);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $results = $stmt->fetch(\PDO::FETCH_ASSOC);

    $user = new User;

    $user->id = $results["id"];
    $user->userName = $results["username"];
    $user->email = $results["email"];
    $user->password = $results["userPassword"];

    return $user;
}
