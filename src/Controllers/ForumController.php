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

    public function getTopics(): void
    {
        $cat_id = (int) trim(htmlentities($_GET['id']));
        $topics = $this->forumRepository->getTopics($cat_id);
        require_once 'templates/Forum/topics.php';
    }
}