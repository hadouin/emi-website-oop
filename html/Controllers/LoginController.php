<?php

namespace App\Controllers;

use App\model\entities\User;
use App\model\UserRepository;

require __DIR__ . '/../../vendor/autoload.php';

class LoginController
{
    private function loginUser(string $uid, string $password): void
    {

        if (empty($uid) || empty($password)) {
            header("location: ../welcome.php?error=emptyInput");
            exit();
        }

        $user = (new UserRepository)->getUserMatchingPwd($uid, $password);

        session_start();
        $_SESSION["userId"] = $user->id;
        $_SESSION["userUid"] = $user->username;
        $_SESSION["userEmail"] = $user->email;

        header('location: /');
    }

    public function post(): void
    {
        if (isset($_POST["submit"])) {
            // grab data
            $uid = $_POST["username"];
            $password = $_POST["password"];

            $this->loginUser($uid, $password);
        }
    }

    public function get(): void
    {
        require_once 'templates/login.php';
    }

}