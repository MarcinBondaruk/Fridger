<?php
declare(strict_types=1);

namespace App\Infrastructure\Transport\QueryBus;

use App\Core\Port\Transport\QueryBus\ISyncQueryBus;
use App\Core\Port\Transport\QueryBus\Query;
use App\Core\Port\Transport\QueryBus\QueryResult;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

class MessengerSyncQueryBus implements ISyncQueryBus
{
    use HandleTrait;

    public function __construct(
        MessageBusInterface $messageBus
    ) {
        $this->messageBus = $messageBus;
    }

    public function dispatch(Query $query): QueryResult
    {
//        return $this->bus->dispatch($query);
        return $this->handle($query);
    }
}
