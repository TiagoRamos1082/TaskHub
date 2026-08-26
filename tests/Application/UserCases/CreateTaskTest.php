<?php

namespace Tests\Application\UserCases;

use PHPUnit\Framework\TestCase;
use App\Application\UserCases\CreateTask;
use App\Domain\Task;
use App\Infrastructure\Repositories\TaskRepository;

class CreateTaskTest extends TestCase
{
    public function testMustCreateTaskSuccesfully(): void
    {
        $repository = $this->createMock(TaskRepository::class);

        $repository
            ->expects($this->once())
            ->method('save')
            ->willReturnCallback(function (Task $task) {
                $task->setId(1);
            });

        $dados = array("name"=>"Estudar PHP", "description"=>"Focar em POO e API", "createdAt"=>"2026-08-25 13:20:23");


        $Create = new CreateTask($repository);

        $task = $Create->execute($dados);

        $this->assertSame(1, $task->getId());
        $this->assertSame('Estudar PHP', $task->getName());
        $this->assertSame('Focar em POO e API', $task->getDescription());
        $this->assertSame('2026-08-25 13:20:23', $task->getCreatedAt()->format('Y-m-d H:i:s'));
    }
}

?>
