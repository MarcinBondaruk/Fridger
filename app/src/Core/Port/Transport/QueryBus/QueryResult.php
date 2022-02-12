<?php
declare(strict_types=1);

namespace App\Core\Port\Transport\QueryBus;

interface QueryResult
{
    public function toString(): string;
    public function toArray(): array;
}
