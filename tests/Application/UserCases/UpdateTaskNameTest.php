<?php




namespace Tests\Application\UserCases;

use App\Application\UserCases\UpdateTaskName;
use App\Domain\Task;
use App\Infrastructure\Repositories\TaskRepository;
use PHPUnit\Framework\TestCase;

class UpdateTaskNameTest extends TestCase
{
    public function testMustUpdateTaskName(): void
    {
        $repository = $this->createMock(TaskRepository::class);

        $repository
            ->expects($this->once())
            ->method('put');

        $task = new Task('Arrumar Quarto', "Quarto do Vitor", "2026-08-23 15:43:55");

        $updateTask = new UpdateTaskName($repository);

        $result = $updateTask->execute('tiago', $task);

        $this->assertSame(true, $result);
    }
}

?>
