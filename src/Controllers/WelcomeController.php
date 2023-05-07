<?php

namespace Emi\Controllers;
use PDO;

class WelcomeController
{
    public function show(): void
    {
        require_once 'templates/welcome.php';
    }
}