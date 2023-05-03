<?php

namespace Emi\Controllers;

use Emi\model\DatabaseConnection;
use Emi\model\UserRepository;

require __DIR__ . '/../../vendor/autoload.php';
class changePasswordController
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function get(): void
    {
        require_once 'templates/changePassword.php';
    }

    public function post() {
        session_start();
        if(isset($_POST['pass_submit'], $_POST['new_password'], $_POST['new_passwordC'])) {
            $new_pwd = htmlspecialchars($_POST['new_password']);
            $new_pwdC = htmlspecialchars($_POST['new_passwordC']);
            if($new_pwd == $new_pwdC && !empty($new_pwd)) {
                $new_pwd = htmlspecialchars($_POST['new_password']);
                $this->userRepository->changePassword($_SESSION["email"], $new_pwd);
                unset($_SESSION["email"]);
                header("location: ../login");
            }
            else {
                $_SESSION['error'] = "les deux champs doivent etre similaire";
            }
        }
        else {

        }
    }
}