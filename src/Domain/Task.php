<?php

namespace App\Domain;

use App\Domain\Enums\Status;
use App\Domain\Enums\Priority;
use DateTime;
use Exception;

class Task
{
    private ?int $id;
    private string $name;
    private ?string $description;
    private Status $status;
    private Priority $priority;
    private DateTime $created_at;
    private ?DateTime $completed_at;


    public function __construct(
        string $name,
        ?string $description,
        string $created_at
    ) {
        $this->id = null;
        $this->name = $name;
        $this->description = $description;
        $this->status = Status::PENDING;
        $this->priority = Priority::LOW;
        $this->created_at = new DateTime($created_at);
        $this->completed_at = null;
    }

    public static function rebuild (
        int $id,
        string $name,
        ?string $description,
        string $status,
        int $priority,
        string $created_at,
        ?string $completed_at
    ): self
    {
        $task = new self(
            $name,
            $description,
            $created_at
        );

        $task -> setId($id);
        $task -> setStatus($status);
        $task -> setPriority($priority);
        $task -> setCreatedAt($created_at);
        $task -> setCompletedAt($completed_at);

        return $task;
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        if($this->id !== null) {
            throw new Exception("ID already defined.");
        }

        $this->id = $id;
    }


    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): ?string
    {
        return  $this->description;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    private function setStatus(string $status): void
    {
        $this->status = Status::from($status);
    }

    public function getStatusToString(): string
    {
        return $this->status->value;
    }

    private function setPriority(string $priority): void
    {
        $this->priority = Priority::from($priority);
    }

    public function getPriority(): Priority
    {
        return $this->priority;
    }

    public function getPriorityToString(): string
    {
        return $this->priority->value;
    }

    private function setCreatedAt(string $created_at): void
    {
        $this->created_at = new DateTime($created_at);
    }

    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }

    public function getCreatedAtToString(): string
    {
        return $this->created_at->format("Y-m-d H:i:s");
    }


    private function setCompletedAt(?string $completed_at): void
    {
        if($completed_at === null) {
            $this->completed_at = null;

            return;
        }

        $this->completed_at = new DateTime($completed_at);
    }

    public function getCompletedAt(): ?DateTime
    {
        return $this->completed_at;
    }

    public function getCompletedAtToString(): ?string
    {
        return $this->completed_at?->format('Y-m-d H:i:s');
    }

}


?>
