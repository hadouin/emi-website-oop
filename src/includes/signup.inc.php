<?php

use Controllers\SignupController;

if (isset($_POST["submit"])){

    // grab data
    $uid = $_POST["uid"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordConfirm = $_POST["password-confirm"];

    // instantiate
    include "../classes/DatabaseConnection.php";
    include "../classes/Signup.php";
    include "../classes/SignupController.php";
    $signup = new SignupController($uid, $email, $password, $passwordConfirm);

    $signup->signupUser();

    header("location: ../welcome.php?error=none");

} else {

    header("location: ../Signup.php");
    exit();

}