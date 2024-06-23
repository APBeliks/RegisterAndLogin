<?php

declare(strict_types=1);

namespace RegisterAndLogin;

use PDOStatement;

require "DTO/User.php";
require "DBHandler.php";

#use RegisterAndLogin\User;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    SendRequestToDB();
} else {
    header("Location: ../index.php");
}


function SendRequestToDB(): void
{
    try {
        $stmt = CreateSQLStatement();

        $stmt->execute();

        $connection = null;
        $stmt = null;

        die("Humor gitówa, rejestracja działa");
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}

function CreateSQLStatement(): PDOStatement
{
    $connection = ConnectToDB();

    $sql = "INSERT INTO users (userName, userPassword, email) VALUES (:userName, :userPassword, :email);";
    $stmt = $connection->prepare($sql);
    $User = GetUserData();
    $stmt->bindParam(":userName", $User->userName);
    $stmt->bindParam(":userPassword", $User->password);
    $stmt->bindParam(":email", $User->email);

    return $stmt;
}

function GetUserData(): User
{
    $User = new User;
    $User->userName = $_POST["username"];
    $User->email = $_POST["email"];
    $User->password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    return $User;
}
