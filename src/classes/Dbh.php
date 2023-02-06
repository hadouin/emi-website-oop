<?php

class Dbh
{
    protected function connect() : PDO
    {
        try {
            $username = "admin";
            $password = "pass";

            $dbh = new PDO('mysql:host=127.0.0.1;dbname=ooplogin;charset=utf8', $username, $password);

            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $dbh;
        } catch (PDOException $exception) {
            print "Error!: " . $exception->getMessage() . "<br/>" . $username . $password;
            die();
        }
    }

}