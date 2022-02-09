<?php
declare(strict_types=1);

namespace App\Infrastructure\Transport\CommandBus;

use App\Core\Port\Transport\CommandBus\Command;
use App\Core\Port\Transport\CommandBus\ISyncCommandBus;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class MessengerSyncCommandBus implements ISyncCommandBus
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private MessageBusInterface $messageBus
    ) {}

    public function dispatch(Command $command): void
    {
        $this->messageBus->dispatch($command);
        $this->entityManager->flush();
    }
}
