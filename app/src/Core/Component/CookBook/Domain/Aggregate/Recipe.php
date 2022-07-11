<?php
declare(strict_types=1);

namespace App\Core\Component\CookBook\Domain\Aggregate;

use App\Core\Component\CookBook\Domain\ValueObject\RecipeId;
use App\Core\Component\CookBook\Domain\ValueObject\RecipeName;

class Recipe
{
    public function __construct(
        private readonly RecipeId $id,
        private RecipeName $recipeName,
        private RecipeDescription $description,
        private RecipeIngredientsBag $ingredients
    ) {
    }
}
