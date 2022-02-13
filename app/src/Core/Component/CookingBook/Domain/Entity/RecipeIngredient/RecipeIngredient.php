<?php
declare(strict_types=1);

namespace App\Core\Component\CookingBook\Domain\Entity\RecipeIngredient;

use App\Core\Component\CookingBook\Domain\Entity\Ingredient\Ingredient;
use App\Core\Component\CookingBook\Domain\Entity\Recipe;

class RecipeIngredient
{
    private Recipe $recipe;
    private Ingredient $ingredient;

    public function __construct(
        private int $ingredientId,
        private string $recipeId,
        private int $amount = 100
    ) {}

    /**
     * @return int
     */
    public function ingredientId(): int
    {
        return $this->ingredientId;
    }

    /**
     * @param int $ingredientId
     */
    public function setIngredientId(int $ingredientId): void
    {
        $this->ingredientId = $ingredientId;
    }

    /**
     * @return string
     */
    public function recipeId(): string
    {
        return $this->recipeId;
    }

    /**
     * @param string $recipeId
     */
    public function setRecipeId(string $recipeId): void
    {
        $this->recipeId = $recipeId;
    }

    /**
     * @return Recipe
     */
    public function recipe(): Recipe
    {
        return $this->recipe;
    }

    /**
     * @param Recipe $recipe
     */
    public function setRecipe(Recipe $recipe): void
    {
        $this->recipe = $recipe;
    }

    /**
     * @return Ingredient
     */
    public function ingredient(): Ingredient
    {
        return $this->ingredient;
    }

    /**
     * @param Ingredient $ingredient
     */
    public function setIngredient(Ingredient $ingredient): void
    {
        $this->ingredient = $ingredient;
    }

    /**
     * @return int
     */
    public function amount(): int
    {
        return $this->amount;
    }
}
