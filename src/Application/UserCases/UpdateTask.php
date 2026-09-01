<?php

namespace App\Application\UserCases;

use App\Domain\Task;
use App\Application\Repositories\TaskRepository;

class UpdateTask
{
    private TaskRepository $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(Task $task): bool
    {
        $this->repository->put($task);

        return true;
    }
}

?>
