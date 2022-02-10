<?php
declare(strict_types=1);

namespace App\Core\Port\Transport\QueryBus;

interface ISyncQueryBus
{
    public function dispatch(Query $query): QueryResult;
}
