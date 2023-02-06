<?php

class Dbh
{
    protected function connect() : PDO
    {
        try {
            $username = "root";
            $password = "example";

            $dbh = new PDO('mysql:host=localhost', $username, $password);

            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $dbh;
        } catch (PDOException $exception) {
            print "Error!: " . $exception->getMessage() . "<br/>" . $username . $password;
            die();
        }
    }

}