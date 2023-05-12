<?php

namespace Emi\Controllers;

use Emi\model\DatabaseConnection;
use Emi\model\UserRepository;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

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
                $this->userRepository->setToken($token, $recup_mail);
                $url = "http://localhost:2003/changePassword?token=" .$token;

                $message = "Bonjour, voici le lien pour la réinitialisation du mot de passe : " .$url;
                $headers = 'content-Type : text/plain; charset="utf-8"'." ";

                require './PHPMailer-master/src/Exception.php';
                require './PHPMailer-master/src/PHPMailer.php';
                require './PHPMailer-master/src/SMTP.php';

                $email = new PHPMailer(true);
                header("location: /login?error=messageSend");
                try {
                    $email->SMTPDebug = SMTP::DEBUG_SERVER;
                    $email->isSMTP();
                    $email->Host = 'smtp-relay.sendinblue.com';               //Adresse IP ou DNS du serveur SMTP
                    $email->Port = 587;                          //Port TCP du serveur SMTP
                    $email->SMTPAuth = 1;                        //Utiliser l'identification

                    if ($email->SMTPAuth) {
                        $email->SMTPSecure = 'tls';               //Protocole de sécurisation des échanges avec le SMTP
                        $email->Username = 'romeo.correc@gmail.com';   //Adresse email à utiliser
                        $email->Password = 'y4QEXHqmc6v7RWGp';         //Mot de passe de l'adresse email à utiliser

                    }

                    $email->CharSet = 'UTF-8'; //Format d'encodage à utiliser pour les caractères
                    $email->addAddress($recup_mail);
                    $email->From = 'no-reply@EMI.com';                //L'email àx afficher pour l'envoi
                    $email->FromName = 'Contact de EMI';             //L'alias à afficher pour l'envoi
                    $email->Subject = 'Réinitialisation de votre mot de passe';                      //Le sujet du mail
                    $email->WordWrap = 50;                               //Nombre de caracteres pour le retour a la ligne automatique
                    $email->Body = $message;          //Texte brut
                    $email->IsHTML(false);                                  //Préciser qu'il faut utiliser le texte brut
                    $email->send();
                    exit();



                } catch (Exception) {
                    echo "Message non envoyé.";
                }
            }

        }
    }

}