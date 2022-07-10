<?php
declare(strict_types=1);

namespace App\Core\Component\CookBook\Application\Write\Command\CreateTagCommand;

use App\Core\Port\Transport\CommandBus\Command;

class CreateTagCommand implements Command
{
    public function __construct(
        private string $value
    ) {}

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->value;
    }
}
