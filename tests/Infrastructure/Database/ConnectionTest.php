<?php

namespace Tests\Infrastructure\Database;

use App\Infrastructure\Database\Connection;
use PHPUnit\Framework\TestCase;

class ConnectionTest extends TestCase
{
    public function testMustCreateAConnection(): void
    {
        $connection = Connection::create();

        $this->assertNotNull($connection);
    }
}


?>
