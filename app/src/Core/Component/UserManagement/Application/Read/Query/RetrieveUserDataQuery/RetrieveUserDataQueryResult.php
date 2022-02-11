<?php
declare(strict_types=1);

namespace App\Core\Component\UserManagement\Application\Read\Query\RetrieveUserDataQuery;

use App\Core\Port\Transport\QueryBus\QueryResult;

class RetrieveUserDataQueryResult implements QueryResult
{
    private function __construct(
        private array $data
    ) {}

    public function toArray(): array
    {
        return $this->data;
    }

    public function toString(): string
    {
        return json_encode($this->data);
    }

    public static function fromArray(array $data): self
    {
        return new self($data);
    }
}
