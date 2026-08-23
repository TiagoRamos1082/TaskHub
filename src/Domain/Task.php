<?php

namespace App\Domain;

use App\Domain\Enums\Status;
use App\Domain\Enums\Priority;
use DateTime;

class Task
{
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
        $this->name = $name;
        $this->description = $description;
        $this->status = Status::PENDING;
        $this->priority = Priority::LOW;
        $this->created_at = new DateTime($created_at);
        $this->completed_at = null;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return  $this->description;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function getPriority(): Priority
    {
        return $this->priority;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }

    public function getCompletedAt(): ?DateTime
    {
        return $this->completed_at;
    }

}


?>
