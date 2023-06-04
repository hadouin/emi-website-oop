<?php

namespace Emi\Controllers;
use PDO;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class WelcomeController
{
    public function show(): void
    {
        require_once 'templates/welcome.php';
    }

    public function contact() {
        if(isset($_POST['submit'], $_POST['name'], $_POST['text'])) {
            $name = $_POST['name'];
            $text = $_POST['text'];
            $message = "Bonjour, l'utilisateur" .$name ."vous à envoyer un message :\n" .$text;
            $headers = 'content-Type : text/plain; charset="utf-8"'." ";

            require './PHPMailer-master/src/Exception.php';
            require './PHPMailer-master/src/PHPMailer.php';
            require './PHPMailer-master/src/SMTP.php';

            $email = new PHPMailer(true);
            header("location: /");
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
                $email->addAddress("roco61460@eleve.isep.fr");
                $email->From = 'contact@EMI.com';                //L'email àx afficher pour l'envoi
                $email->FromName = $name;             //L'alias à afficher pour l'envoi
                $email->Subject = 'contact from' .$name;                      //Le sujet du mail
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