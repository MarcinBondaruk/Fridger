<?php
declare(strict_types=1);

namespace App\Core\Component\UserManagement\Application\Read\Query\RetrieveUserDataQuery;

use App\Core\Port\Transport\QueryBus\Query;

class RetrieveUserDataQuery implements Query
{
    public function __construct(
        private string $id
    ) {}

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }
}
