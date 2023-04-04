<?php

namespace Emi\model;

use PDO;

class DatabaseConnection
{

    public ?PDO $database = null;

    public function getConnection(): PDO
    {
        if (!$this->database === null) {
            return $this->database;
        } else {
            try {
                $servername = $_ENV['MYSQL_HOST'];
                $username = $_ENV['MYSQL_USER'];
                $password = $_ENV['MYSQL_PASSWORD'];
                $dbname = $_ENV['MYSQL_DATABASE'];
                $port = $_ENV['MYSQL_PORT'];

                $database = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
                $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $this->database = $database;

            } catch (PDOException $exception) {
                print "Error!: " . $exception->getMessage() . "<br/>" . $username . $password;
                die();
            }
        }

        return $this->database;

    }

}