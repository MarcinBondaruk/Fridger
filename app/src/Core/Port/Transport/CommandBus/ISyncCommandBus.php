<?php
declare(strict_types=1);

namespace App\Core\Port\Transport\CommandBus;

interface ISyncCommandBus
{
    public function dispatch(Command $command): void;
}
