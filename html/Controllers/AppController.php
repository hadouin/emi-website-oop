<?php

namespace App\Controllers;

class AppController
{
    public function get(): void
    {
        require_once 'templates/app/dashboard.php';
    }
}
