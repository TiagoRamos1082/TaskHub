<?php

namespace Tests\Infrastructure\Repositories;

use PHPUnit\Framework\TestCase;
use App\Infrastructure\Database\Connection;
use App\Infrastructure\Repositories\TaskRepository;
use App\Domain\Task;

class TaskRepositoryTest extends TestCase
{
    public function testMustCreatePesistenceToTask(): void
    {
        $connection = Connection::create();
        $repository = new TaskRepository($connection);

        $task = new Task('Arrumar Quarto', "Quarto do Vitor", "2026-08-23 15:43:55");

        $repository->save($task);

        $sql = '
            select id from tasks where id = :id;
        ';

        $stmt = $connection->prepare($sql);
        $stmt->execute([
            'id'=>$task->getId()
        ]);

        $resultId = $stmt->fetchColumn();

        $this->assertSame($resultId, $task->getId());

        $sql = '
            delete from tasks where id = :id;
        ';

        $stmt = $connection->prepare($sql);
        $stmt->execute([
            'id'=>$task->getId()
        ]);
    }

    public function testMustDeleteATaskWithId(): void
    {
        $connection = Connection::create();
        $repository = new TaskRepository($connection);

        $task = new Task('Arrumar Quarto', "Quarto do Vitor", "2026-08-23 15:43:55");

        $repository->save($task);

        $repository->deleteById($task->getId());

        $sql = '
            select id from tasks where id = :id;
        ';

        $stmt = $connection->prepare($sql);
        $stmt->execute([
            'id'=>$task->getId()
        ]);

        $resultId = $stmt->fetchColumn();

        $this->assertSame(false, $resultId);
    }
}


?>
