<?php

namespace App\Application\Repositories;

use App\Domain\Task;

interface TaskRepository
{
    public function save(Task $task): void;

    public function deleteById(int $id): void;

    public function update(Task $task): void;

}

?>
