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
        $stmt = $this->database->getConnection()->prepare('SELECT * FROM forum ORDER BY ordre;');
        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ../welcome?error=forum-failed");
            exit();
        }

        return $stmt->fetchAll();
    }

    public function getTopics($id_cat) {
        $stmt = $this->database->getConnection()->prepare('SELECT * FROM topic WHERE id_forum = ? ORDER BY date_creation DESC');
        if (!$stmt->execute(array($id_cat))) {
            $stmt = null;
            header("location: ../Forum/forum?error=noTopicsFound");
            exit();
        }

        return $stmt->fetchAll();
    }

    public function getComments() {

    }

}