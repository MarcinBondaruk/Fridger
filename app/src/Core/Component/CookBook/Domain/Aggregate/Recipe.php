<?php
declare(strict_types=1);

namespace App\Core\Component\CookBook\Domain\Aggregate;

use App\Core\Component\CookBook\Domain\ValueObject\RecipeName;

class Recipe
{
    public function __construct(
        private string $id,
        private RecipeName $recipeName,
        private string $description,
        private array $ingredients,
        private array $tags = []
    ) {
    }
}
