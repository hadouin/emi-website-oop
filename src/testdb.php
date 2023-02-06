<?php

try {
    $username = "root";
    $password = "example";
    $port= "3306";
    $host= "127.0.0.1";

    $dbh = new PDO('mysql:host=' . $host . ';port=' . $port, $username, $password);

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbh;
} catch (PDOException $exception) {
    print "Error!: " . $exception->getMessage() . "<br/>" . $username . $password;
    die();
}