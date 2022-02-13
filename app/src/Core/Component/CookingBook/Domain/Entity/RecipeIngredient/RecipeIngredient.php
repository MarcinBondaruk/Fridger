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
        private string $ingredientId,
        private string $recipeId
    ) {}

    /**
     * @return string
     */
    public function ingredientId(): string
    {
        return $this->ingredientId;
    }

    /**
     * @param string $ingredientId
     */
    public function setIngredientId(string $ingredientId): void
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
}
