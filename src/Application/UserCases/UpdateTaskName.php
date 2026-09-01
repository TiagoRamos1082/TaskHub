<?php

namespace App\Application\UserCases;

use App\Application\Repositories\TaskRepository;
use App\Domain\Task;

class UpdateTaskName
{
    private TaskRepository $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(string $name, Task $task): bool
    {

        $task->setName($name);

        $this->repository->put($task);

        return true;
    }
}

?>
