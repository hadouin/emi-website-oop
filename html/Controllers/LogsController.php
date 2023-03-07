<?php

namespace App\Controllers;

class LogsController
{
    public function get(): void
    {
        require_once 'templates/logs.php';
    }
}