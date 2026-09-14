<?php

namespace App\Application\UserCases;

<<<<<<< HEAD
use App\Domain\Task;
use App\Application\Repositories\TaskRepository;
=======
use App\Application\Repositories\TaskRepository;
use App\Domain\Task;
>>>>>>> 545162f (feat: add Update Task Description and tests)

class UpdateTaskDescription
{
    private TaskRepository $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(string $description, Task $task): bool
    {
<<<<<<< HEAD
=======

>>>>>>> 545162f (feat: add Update Task Description and tests)
        $task->setDescription($description);

        $this->repository->put($task);

        return true;
    }
}

?>
