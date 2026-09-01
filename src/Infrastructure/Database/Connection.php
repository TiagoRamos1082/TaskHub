<?php

namespace App\Infrastructure\Database;

use Dotenv\Dotenv;
use PDO;


class Connection
{

    public static function create(): PDO
    {

        self::loadEnvironment();

        $dbname = $_ENV['DB_NAME'];
        $dbuser = $_ENV['DB_USERNAME'];
        $dbport = $_ENV['DB_PORT'];
        $dbpassword = $_ENV['DB_PASSWORD'];
        $dbhost = $_ENV['DB_HOST'];

        $dsn = "mysql:host={$dbhost};dbname={$dbname};port={$dbport};charset=utf8mb4";

        return new PDO($dsn, $dbuser, $dbpassword, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]);

    }

    private static function loadEnvironment(): void
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__, 3));
        $dotenv->load();
    }
}


?>
