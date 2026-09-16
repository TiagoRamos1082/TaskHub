<?php

namespace Tests\Application\UserCases;

use App\Application\UserCases\InProgressTask;
use App\Domain\Task;
use App\Infrastructure\Repositories\TaskRepository;
use PHPUnit\Framework\TestCase;

class InProgressTaskTest extends TestCase
{
    public function testMustUpdateTaskToInProgressStatus(): void
    {
        $repository = $this->createMock(TaskRepository::class);

        $repository
            ->expects($this->once())
            ->method('put');

        $task = new Task('Arrumar Quarto', "Quarto do Vitor", "2026-08-23 15:43:55");

        $updateTask = new InProgressTask($repository);

        $result = $updateTask->execute($task);

        $this->assertSame(true, $result);
    }
}

?>
