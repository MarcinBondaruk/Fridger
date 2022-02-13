<?php
declare(strict_types=1);

namespace App\Core\Component\CookingBook\Domain\Entity\Ingredient;

use App\Core\Component\CookingBook\Domain\Entity\RecipeIngredient\RecipeIngredient;

class Ingredient
{
    private int $id;

    /**
     * @var RecipeIngredient[]
     */
    private array $recipeIngredients;

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

    /**
     * @return int
     */
    public function id(): int
    {
        return $this->id;
    }

    /**
     * @return RecipeIngredient[]
     */
    public function recipeIngredients(): array
    {
        return $this->recipeIngredients;
    }
}
