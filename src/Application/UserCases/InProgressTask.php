<?php

namespace App\Application\UserCases;

use App\Application\Repositories\TaskRepository;
use App\Domain\Task;

class InProgressTask
{
    private TaskRepository $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(Task $task): bool
    {
        $task->inProgressTask();

        $this->repository->put($task);

        return true;
    }
}

?>
