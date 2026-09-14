<?php

namespace App\Application\UserCases;

use App\Application\Repositories\TaskRepository;
use App\Domain\Task;

class UpdateTaskPriority
{
    private TaskRepository $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(string $priority, Task $task): bool
    {

        $task->setPriority($priority);

        $this->repository->put($task);

        return true;
    }
}

?>
