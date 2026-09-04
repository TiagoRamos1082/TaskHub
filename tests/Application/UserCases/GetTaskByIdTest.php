<?php

namespace Tests\Application\UserCases;

use PHPUnit\Framework\TestCase;
use App\Infrastructure\Repositories\TaskRepository;
use App\Application\UserCases\GetTaskById;

class GetTaskByIdTest extends TestCase
{
    public function testMustReturnATask(): void
    {
        $repository = $this->createMock(TaskRepository::class);

        $array = [
            'id' => 1,
            'name' => 'Arrumar Quarto',
            'description' => 'Quarto do Vitor',
            'status' => 'PENDING',
            'priority' => 1,
            'created_at' => '2026-08-23 15:08:55',
            'completed_at' => '2026-08-23 16:00:00'
        ];

        $repository
            ->expects($this->once())
            ->method('getById')
            ->willReturn($array);

        $getTaskById = new GetTaskById($repository);

        $task = $getTaskById->execute(1);

        $this->assertSame(1, $task->getId());
    }

}

?>
