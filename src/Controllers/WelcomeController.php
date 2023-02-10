<?php

namespace App\Controllers;

class WelcomeController
{
    public function render(): void
    {
        require_once 'templates/welcome.php';
    }
}