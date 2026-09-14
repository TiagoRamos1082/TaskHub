<?php

namespace App\Application\UserCases;

use App\Application\Repositories\TaskRepository;
use App\Domain\Task;

class CompleteTask
{
    private TaskRepository $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(string $completed_at, Task $task): bool
    {

        $task->completeTask($completed_at);

        $this->repository->put($task);

        return true;
    }
}

?>
