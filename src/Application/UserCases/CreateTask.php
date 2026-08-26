<?php

namespace App\Application\UserCases;

use App\Domain\Task;
use App\Application\Repositories\TaskRepository;

class CreateTask
{
    private TaskRepository $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(array $dados): Task
    {
        $task = new Task($dados['name'], $dados['description'], $dados['createdAt']);

        $this->repository->save($task);

        return $task;
    }
}


?>
