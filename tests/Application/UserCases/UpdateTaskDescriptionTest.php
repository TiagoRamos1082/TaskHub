<?php

namespace Tests\Application\UserCases;

use App\Application\UserCases\UpdateTaskDescription;
use App\Domain\Task;
use App\Infrastructure\Repositories\TaskRepository;
use PHPUnit\Framework\TestCase;

class UpdateTaskDescriptionTest extends TestCase
{
    public function testMustUpdateTaskName(): void
    {
        $repository = $this->createMock(TaskRepository::class);

        $repository
            ->expects($this->once())
            ->method('put');

        $task = new Task('Arrumar Quarto', "Quarto do Vitor", "2026-08-23 15:43:55");

        $updateTask = new UpdateTaskDescription($repository);

<<<<<<< HEAD
        $result = $updateTask->execute('description', $task);
=======
        $result = $updateTask->execute('tiago', $task);
>>>>>>> 545162f (feat: add Update Task Description and tests)

        $this->assertSame(true, $result);
    }
}

?>
