<?php

namespace Emi\Controllers;

class changePasswordController
{
    public function get(): void
    {
        require_once 'templates/changePassword.php';
    }
}