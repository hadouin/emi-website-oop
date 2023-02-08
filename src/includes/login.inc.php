<?php

use Controllers\LoginController;

if (isset($_POST["submit"])){

    // grab data
    $uid = $_POST["username"];
    $password = $_POST["password"];

    // instantiate
    include "../classes/DatabaseConnection.php";
    include "../classes/Login.php";
    include "../classes/LoginController.php";
    $signup = new LoginController($uid, $password);

    $signup->loginUser();

    header("location: ../welcome.php?error=none");

} else {

    header("location: ../Login.php");
    exit();

}
