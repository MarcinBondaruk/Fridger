<?php
declare(strict_types=1);

namespace App\Core\Component\CookBook\Application\Read\Query\RetrieveIngredientsQuery;

use App\Core\Port\Transport\QueryBus\QueryResult;

class RetrieveIngredientsQueryResult implements QueryResult
{
    private function __construct(
        private array $data
    ) {}

    public function toString(): string
    {
        return json_encode($this->data);
    }

    public function toArray(): array
    {
        return $this->data;
    }

    public static function fromArray(array $data): self
    {
        return new self($data);
    }
}
