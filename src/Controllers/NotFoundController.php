<?php

namespace Emi\Controllers;

class NotFoundController
{
    public function show(): void
    {
        require_once 'templates/404.php';
    }
}