<?php

namespace Emi\model;

use Emi\model\DatabaseConnection;
use Emi\model\entities\Worker;
use PDO;

require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/model/DatabaseConnection.php');
class WorkerRepository
{
    public DatabaseConnection $database;

    public function __construct()
    {
        $this->database = new DatabaseConnection();
    }

    public function setWorker(string $firstName, string $lastName, string $code ): void
    {
        $stmt = $this->database->getConnection()->prepare("INSERT INTO worker (worker_firstname, worker_lastname, worker_code) VALUES (?,?,?)");

        if (!$stmt->execute(array($firstName, $lastName, $code)))
        {
            $stmt = null;
            header("location: /app/workers/new?error=error");
            exit();
        }

        $stmt = null;
    }

    public function getAllWorkers(): array
    {
        $stmt = $this->database->getConnection()->prepare("SELECT * FROM worker");
        $stmt->execute();

        $workers = array();

        // Fetch the results row by row
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $worker = new Worker();
            $worker->setId($row['worker_id']);
            $worker->setFirstName($row['worker_firstname']);
            $worker->setLastName($row['worker_lastname']);
            $worker->setCode($row['worker_code']);

            // Add the worker to the array
            $workers[] = $worker;
        }

        return $workers;

    }
}