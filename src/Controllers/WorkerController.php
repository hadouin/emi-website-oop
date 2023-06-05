<?php

namespace Emi\Controllers;

use Emi\model\entities\Worker;
use Emi\model\WorkerRepository;
use http\Env\Response;

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

    public function searchAjax(): void
    {
        // Get the search query from the request
        $query = $_GET['q'];

        // Perform the search operation and get the search results
        // You can replace this with your own search logic
        $searchResults = $this->workerRepository->search($query);

        // Set the response headers to indicate JSON content
        header('Content-Type: application/json');

        // Convert the search results to JSON format
        $jsonResponse = json_encode($searchResults);

        // Return the JSON response
        echo $jsonResponse;
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