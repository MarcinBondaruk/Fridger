<?php
declare(strict_types=1);

namespace App\Infrastructure\Transport\CommandBus;

use App\Core\Port\Transport\CommandBus\Command;
use App\Core\Port\Transport\CommandBus\ISyncCommandBus;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\MessageBusInterface;
use Throwable;

class MessengerSyncCommandBus implements ISyncCommandBus
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private MessageBusInterface $messageBus
    ) {}

    public function dispatch(Command $command): void
    {
        $this->entityManager->getConnection()->beginTransaction();

        try {
            $this->messageBus->dispatch($command);
            $this->entityManager->flush();
            $this->entityManager->getConnection()->commit();
        } catch(HandlerFailedException $e) {
            $this->entityManager->getConnection()->rollBack();

            // bullshit boilerplate because of messenger
            while ($e instanceof HandlerFailedException) {
                /** @var Throwable $e */
                $e = $e->getPrevious();
            }

            throw $e;
        }
    }
}
