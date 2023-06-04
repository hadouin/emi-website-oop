<?php
namespace Emi\Controllers;

use Emi\model\entities\User;
use Emi\model\UserRepository;

require __DIR__ . '/../../vendor/autoload.php';

class LoginController
{
    private function loginUser(string $uid, string $password): void
    {

        if (empty($uid) || empty($password)) {
            header("location: /login?error=emptyInput");
            exit();
        }

        $user = (new UserRepository)->getUserMatchingPwd($uid, $password);

        session_start();
        $_SESSION["userId"] = $user->getId();
        $_SESSION["userUid"] = $user->getUsername();
        $_SESSION["userEmail"] = $user->getEmail();
        $_SESSION["userRole"] = $user->getRole();

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