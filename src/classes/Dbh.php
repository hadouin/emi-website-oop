<?php

class Dbh
{
    public function connect() : PDO
    {
        try {
            $servername = $_ENV['MYSQL_HOST'];
            $username = $_ENV['MYSQL_USER'];
            $password = $_ENV['MYSQL_PASSWORD'];
            $dbname = $_ENV['MYSQL_DATABASE'];
            $port = $_ENV['MYSQL_PORT'];

            $dbh = new PDO("mysql:host=$servername;port=$port;dbname=$dbname",$username,$password);

            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $dbh;
        } catch (PDOException $exception) {
            print "Error!: " . $exception->getMessage() . "<br/>" . $username . $password;
            die();
        }
    }

}