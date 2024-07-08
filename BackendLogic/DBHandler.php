<?php

declare(strict_types=1);

namespace RegisterAndLogin;

use PDO;

class DBHandler
{
    private $conection;

    function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=localhost;dbname=area_51", "root", "");
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection to data base failed: " . $e->getMessage();
        }
    }

    function connect(): PDO
    {
        return $this->connection;
    }
}
