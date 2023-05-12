<?php

namespace Emi\model;

use Emi\model\DatabaseConnection;

require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/model/entities/User.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/model/DatabaseConnection.php');

class ForumRepository
{
    public DatabaseConnection $database;

    public function __construct()
    {
        $this->database = new DatabaseConnection();
    }

    public function getCategories() {

    }

    public function getTopics() {

    }

    public function getComments() {

    }

}