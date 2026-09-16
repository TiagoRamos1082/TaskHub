<?php

namespace Tests\Application\UserCases;

use App\Application\UserCases\UpdateTaskPriority;
use App\Domain\Task;
use App\Infrastructure\Repositories\TaskRepository;
use PHPUnit\Framework\TestCase;

class UpdateTaskPriorityTest extends TestCase
{
    public function testMustUpdateTaskPriority(): void
    {
        $repository = $this->createMock(TaskRepository::class);

        $repository
            ->expects($this->once())
            ->method('put');

        $task = new Task('Arrumar Quarto', "Quarto do Vitor", "2026-08-23 15:43:55");

        $updateTask = new UpdateTaskPriority($repository);

        $result = $updateTask->execute(2, $task);

        $this->assertSame(true, $result);
    }
}

?>
