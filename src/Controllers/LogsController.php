<?php

namespace Emi\Controllers;

class LogsController
{
    public function get(): void
    {
        require_once 'templates/logs.php';
    }
}