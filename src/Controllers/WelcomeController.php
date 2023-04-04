<?php

namespace Emi\Controllers;

class WelcomeController
{
    public function show(): void
    {
        require_once 'templates/welcome.php';
    }
}