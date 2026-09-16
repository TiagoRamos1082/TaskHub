<?php

namespace Tests\Application\UserCases;

use App\Application\UserCases\CompleteTask;
use App\Domain\Task;
use App\Infrastructure\Repositories\TaskRepository;
use PHPUnit\Framework\TestCase;

class CompleteTaskTest extends TestCase
{
    public function testMustUpdateTaskToCompleteStatus(): void
    {
        $repository = $this->createMock(TaskRepository::class);

        $repository
            ->expects($this->once())
            ->method('put');

        $task = new Task('Arrumar Quarto', "Quarto do Vitor", "2026-08-23 15:43:55");

        $updateTask = new CompleteTask($repository);

        $result = $updateTask->execute("2026-08-23 15:43:56", $task);

        $this->assertSame(true, $result);
    }
}

?>
