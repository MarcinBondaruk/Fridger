<?php
declare(strict_types=1);

namespace App\Core\Component\UserManagement\Application\Read\Query;

use App\Core\Port\Transport\QueryBus\QueryResult;

class RetrieveUsersQueryResult implements QueryResult
{
    private function __construct(
        private array $data
    ) {}

    public function toString(): string
    {
        return json_encode($this->data);
    }

    public static function fromArray(array $data): self
    {
        return new self($data);
    }
}
