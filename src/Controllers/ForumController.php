<?php

namespace Emi\Controllers;

require __DIR__ . '/../../vendor/autoload.php';

class ForumController
{
    public function get(): void
    {
        require_once 'templates/Forum/forum.php';
    }

}