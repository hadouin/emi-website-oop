<?php

namespace App\Controllers;

class NotFoundController
{
    public function show(): void
    {
        require_once 'templates/404.php';
    }
}