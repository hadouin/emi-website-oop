<?php

namespace Emi\Controllers;

use Emi\model\entities\Worker;
use Emi\model\WorkerRepository;

require __DIR__ . '/../../vendor/autoload.php';

class WorkerController
{
    public WorkerRepository $workerRepository;

    public function __construct()
    {
        $this->workerRepository = new WorkerRepository();
    }

    public function showAll(): void
    {
        $workers = $this->workerRepository->getAllWorkers();
        require_once 'templates/app/workers/index.php';
    }

    public function new(): void
    {
        require_once 'templates/app/workers/new.php';
    }

    public function post(): void
    {
        if (isset($_POST["submit"])) {
            // grab data
            $firstName = $_POST["firstname"];
            $lastName = $_POST["lastname"];
            $code = $_POST["code"];

            $this->workerRepository->setWorker($firstName, $lastName, $code);

            $_POST = null;
            header('location: /app/workers');

        }
    }

}