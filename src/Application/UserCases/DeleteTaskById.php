<?php

namespace App\Application\UserCases;

use App\Application\Repositories\TaskRepository;

class DeleteTaskById
{
    private TaskRepository $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id): bool
    {
        $this->repository->deleteById($id);

        return true;
    }
}


?>
