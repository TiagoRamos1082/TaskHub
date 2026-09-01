<?php


namespace Tests\Domain;

use App\Domain\Enums\Status;
use App\Domain\Enums\Priority;
use App\Domain\Task;
use PHPUnit\Framework\TestCase;
use TypeError;

class TaskTest extends TestCase
{
    public function testMustCreateATask(): void
    {
        $task = new Task('Arrumar Quarto', "Quarto do Vitor", "2026-08-23 15:43:55");

        $this->assertSame("Arrumar Quarto", $task->getName());
        $this->assertSame("Quarto do Vitor", $task->getDescription());
        $this->assertEquals( Status::PENDING, $task->getStatus());
        $this->assertEquals( Priority::LOW, $task->getPriority());
        $this->assertSame(("2026-08-23 15:43:55"), $task->getCreatedAt()->format('Y-m-d H:i:s'));
        $this->assertSame(null , $task->getCompletedAt());
    }

    public function testMustNotCreateATaskWithoutName(): void
    {
        $this->expectException(TypeError::class);
        $task = new Task(null, "Quarto do Vitor", "2026-08-23 15:43:55");
    }

    public function testMustNotCreateATaskWithoutCreatedAt(): void
    {
        $this->expectException(TypeError::class);
        $task = new Task("Arrumar Quarto", "Quarto do Vitor", null);
    }

    public function testMustCreateATaskWithoutDescription(): void
    {
        $task = new Task('Arrumar Quarto', null, "2026-08-23 15:43:55");

        $this->assertSame("Arrumar Quarto", $task->getName());
        $this->assertSame(null , $task->getDescription());
    }

}

?>
