<?php

namespace Emi\Controllers;

use Emi\model\ForumRepository;
use Emi\model\UserRepository;

require __DIR__ . '/../../vendor/autoload.php';

class ForumController
{
    private ForumRepository $forumRepository;

    public function __construct()
    {
        $this->forumRepository = new ForumRepository();
    }

    public function get(): void
    {
        $categories = $this->forumRepository->getCategories();
        require_once 'templates/Forum/forum.php';
    }

    public function getSujet(): void
    {
        $cat_id = (int) trim(htmlentities($_GET['id']));
        $topics = $this->forumRepository->getSujet($cat_id);
        require_once 'templates/Forum/sujet.php';
    }

    public function showTopic() {
        $id_topic = (int) trim(htmlentities($_GET['id']));
        $chosenTopic = $this->forumRepository->getOneTopic($id_topic);
        $comments = $this->forumRepository->getComments($id_topic);
        require_once 'templates/Forum/topic.php';
    }

    public function getCreateTopic() {
        $categories = $this->forumRepository->getCategories();
        require_once 'templates/Forum/createTopic.php';
    }

    public function CreateTopic() {
        session_start();
        if(isset($_POST['create-topic'])) {
            $category = htmlentities((trim($_POST['category'])));
            $titre = htmlentities((trim($_POST['title'])));
            $content = htmlentities((trim($_POST['content'])));
            $date_creation = date('Y-m-d H:i:s');

            $this->forumRepository->insertNewTopic($category, $titre, $content, $date_creation, $_SESSION["userId"]);
            header('location: ../Forum/sujet?id=' .$category);
        }
    }

    public function Comment()
    {
        session_start();
        if(isset($_POST['create-comment'])) {
            $content = $_POST['comment'];
            $id = $_POST['topicId'];
            $date_creation = date('Y-m-d H:i:s');

            $this->forumRepository->insertComment($id, $_SESSION['userId'], $content, $date_creation);
            header('location: ../Forum/topic?id=' .$id);
        }

    }

    public function deleteSujet() {
        $cat_id = (int) trim(htmlentities($_GET['catId']));
        $id = (int) trim(htmlentities($_GET['Id']));
        $this->forumRepository->deleteSubject($id);
        $topics = $this->forumRepository->getSujet($cat_id);
        header('location: /Forum/sujet?id=' .$cat_id);
    }
}