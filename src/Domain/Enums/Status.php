<?php

namespace App\Domain\Enums;

enum Status: string
{
    case PENDING = 'PENDING';
    case IN_PROGRESS = 'IN_PROGRESS';
    case COMPLETE = 'COMPLETE';
}

?>
