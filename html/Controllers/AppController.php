<?php

namespace Emi\Controllers;

class AppController
{
    public function get(): void
    {
        session_start();
        if (!isset($_SESSION["userId"])){
            header('location: /login');
        }

        $userRole = "ADMIN";
        require_once 'templates/app/dashboard.php';
    }
}
