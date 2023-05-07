<?php

namespace Emi\Controllers;

use Emi\model\DatabaseConnection;
use Emi\model\UserRepository;

require __DIR__ . '/../../vendor/autoload.php';

class ForgotPasswordController
{

    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function get(): void
    {
        require_once 'templates/forgotPassword.php';
    }

    public function post() : void
    {
        if(isset($_POST['recup_submit'], $_POST['recup_email'])) {
            if(!empty($_POST['recup_email'])) {

                $recup_mail = htmlspecialchars($_POST['recup_email']);
                $token = uniqid();
                $url = "";

                $message = "Bonjour, voici le lien pour la réinitialisation du mot de passe : $url";
                $headers = 'content-Type : text/plain; charset="utf-8"'." ";

                mail($recup_mail, "Forgot password", $message, $headers);
                $this->userRepository->setToken($token, $recup_mail);
                $_SESSION['error'] = "Mail envoyé à ". $recup_mail;
                header("location: ../login");
            }
        }
    }
}