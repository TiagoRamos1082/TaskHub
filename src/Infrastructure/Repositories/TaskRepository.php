<?php

namespace App\Infrastructure\Repositories;

use App\Application\Repositories\TaskRepository as TaskRepositoryInterface;
use App\Domain\Task;
use PDO;



class TaskRepository implements TaskRepositoryInterface
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;

    }

    public function save(Task $task): void
    {
        $sql = '
            INSERT INTO tasks(name, description, status, priority, created_at, completed_at)
            VALUES
            (:name, :desc, :status, :priority, :created, :completed);
        ';

        $stmt = $this->connection->prepare($sql);

        $stmt->execute([
            'name'=>$task->getName(),
            'desc'=>$task->getDescription(),
            'status'=>$task->getStatusToString(),
            'priority'=>$task->getPriorityToString(),
            'created'=>$task->getCreatedAt()->format('Y-m-d H:m:s'),
            'completed'=>$task->getCompletedAt()?->format('Y-m-d H:m:s')
        ]);

        $id = $this->connection->lastInsertId();

        $task->setId($id);
    }

    public function deleteById(int $id): void
    {

    }


}

?>
