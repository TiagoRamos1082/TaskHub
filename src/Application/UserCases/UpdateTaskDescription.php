<?php

namespace App\Application\UserCases;

use App\Domain\Task;
use App\Application\Repositories\TaskRepository;

class UpdateTaskDescription
{
    private TaskRepository $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(string $description, Task $task): bool
    {
        $task->setDescription($description);

        $this->repository->put($task);

        return true;
    }
}

?>
