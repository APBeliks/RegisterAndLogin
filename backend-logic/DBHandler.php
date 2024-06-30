<?php

declare(strict_types=1);

namespace RegisterAndLogin;

use PDO;

class DBHandler
{
    function connect(): PDO
    {
        try {
            $connection = new PDO("mysql:host=localhost;dbname=area_51", "root", "");
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection to data base failed: " . $e->getMessage();
        }
        return $connection;
    }
}
