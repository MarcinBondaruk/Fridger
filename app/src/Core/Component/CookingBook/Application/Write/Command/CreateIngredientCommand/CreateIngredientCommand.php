<?php
declare(strict_types=1);

namespace App\Core\Component\CookingBook\Application\Write\Command\CreateIngredientCommand;

use App\Core\Port\Transport\CommandBus\Command;

class CreateIngredientCommand implements Command
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
