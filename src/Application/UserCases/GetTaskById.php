<?php

namespace App\Application\UserCases;

use App\Domain\Task;
use App\Application\Repositories\TaskRepository;

class GetTaskById
{
    private TaskRepository $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id): Task
    {
        $dados = $this->repository->getById($id);

        $task = Task::rebuild(
            $dados['id'],
            $dados['name'],
            $dados['description'],
            $dados['status'],
            $dados['priority'],
            $dados['created_at'],
            $dados['completed_at']
        );

        return $task;
    }
}

?>
