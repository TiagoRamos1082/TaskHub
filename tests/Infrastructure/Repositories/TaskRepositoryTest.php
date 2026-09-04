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

    public function testMustUpdateATask(): void
    {
        $connection = Connection::create();

        $repository = new TaskRepository($connection);

        $task = new Task('Arrumar Quarto', "Quarto do Vitor", "2026-08-23 15:43:55");

        $repository->save($task);

        $task->setName('Arrumar Cama');

        $repository->put($task);

        $sql = '
            select id from tasks where id = :id;
        ';

        $stmt = $connection->prepare($sql);
        $stmt->execute([
            'id'=>$task->getId()
        ]);

        $resultId = $stmt->fetchColumn();

        $this->assertSame($resultId, $task->getId());
        $this->assertSame('Arrumar Cama', $task->getName());

        $sql = '
            DELETE FROM tasks WHERE id = :id;
        ';

        $stmt = $connection->prepare($sql);

        $stmt->execute([
            'id'=>$task->getId()
        ]);
    }

    public function testMustGetTaskById(): void
    {
        $connection = Connection::create();

        $repository = new TaskRepository($connection);

        $sql = 'INSERT INTO tasks ( name, description, status, priority, created_at, completed_at)
                VALUES (:name, :description, :status, :priority, :created_at, :completed_at)';

        $stmt = $connection->prepare($sql);

        $stmt->execute([
            ':name'         => 'Arrumar Quarto',
            ':description'  => 'Quarto do Vitor',
            ':status'       => 'PENDING',
            ':priority'     => 1,
            ':created_at'   => '2026-08-23 15:08:55',
            ':completed_at' => '2026-08-23 16:00:00'
        ]);

        $id = $connection->lastInsertId();

        $result = $repository->getById($id);

        print_r($result);

        $this->assertSame((int)$id, $result['id']);

        $sql = '
            DELETE FROM tasks WHERE id = :id;
        ';

        $stmt = $connection->prepare($sql);

        $stmt->execute([
            'id'=>$result['id']
        ]);
    }
}


?>
