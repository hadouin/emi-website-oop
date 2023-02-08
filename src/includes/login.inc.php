<?php

if (isset($_POST["submit"])){

    // grab data
    $uid = $_POST["username"];
    $password = $_POST["password"];

    // instantiate
    include "../classes/Dbh.php";
    include "../classes/Login.php";
    include "../classes/LoginController.php";
    $signup = new LoginController($uid, $password);

    $signup->loginUser();

    header("location: ../index.php?error=none");

} else {

    header("location: ../Login.php");
    exit();

}
