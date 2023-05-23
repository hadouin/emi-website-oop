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

    public function getSujet($id_cat) {
        $stmt = $this->database->getConnection()->prepare('SELECT T.*, U.user_uid as pseudo FROM topic T LEFT JOIN user U ON T.id_user = U.user_id WHERE T.id_forum = ? ORDER BY T.date_creation DESC');
        if (!$stmt->execute(array($id_cat))) {
            $stmt = null;
            header("location: ../Forum/forum?error=noTopicsFound");
            exit();
        }

        return $stmt->fetchAll();
    }

    public function getOneTopic($id_topic) {
        $stmt = $this->database->getConnection()->prepare('SELECT T.*, U.user_uid as pseudo FROM topic T LEFT JOIN user U ON T.id_user = U.user_id WHERE T.id = ?');
        if (!$stmt->execute(array($id_topic))) {
            $stmt = null;
            header("location: ../Forum/forum?error=noTopicsFound");
            exit();
        }

        return $stmt->fetch();
    }

    public function getComments($id_topic) {
        $stmt = $this->database->getConnection()->prepare('SELECT TC.*, U.user_uid as pseudo FROM topic_commentaire TC LEFT JOIN user U ON TC.id_user = U.user_id WHERE TC.id_topic = ?');
        if (!$stmt->execute(array($id_topic))) {
            $stmt = null;
            header("location: ../Forum/forum?error=noTopicsFound");
            exit();
        }

        return $stmt->fetchAll();
    }

    public function insertNewTopic($id_forum, $titre, $contenu, $date_creation, $id_user) {
        $stmt = $this->database->getConnection()->prepare('INSERT INTO topic (id_forum, titre, contenu, date_creation, id_user) VALUES (?, ?, ?, ?, ?)');
        if (!$stmt->execute(array($id_forum, $titre, $contenu, $date_creation, $id_user))) {
            $stmt = null;
            header("location: ../Forum/forum?error=noTopicsFound");
            exit();
        }
    }

    public function insertComment() {

    }
}