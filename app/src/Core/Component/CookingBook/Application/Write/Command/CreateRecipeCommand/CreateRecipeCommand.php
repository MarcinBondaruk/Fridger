<?php
declare(strict_types=1);

namespace App\Core\Component\CookingBook\Application\Write\Command\CreateRecipeCommand;

use App\Core\Port\Transport\CommandBus\Command;

class CreateRecipeCommand implements Command
{
    public function __construct(
        private string $id,
        private string $title,
        private string $description,
        private array $ingredientIds
    ) {}

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function description(): string
    {
        return $this->description;
    }

    /**
     * @return array
     */
    public function ingredientIds(): array
    {
        return $this->ingredientIds;
    }
}
