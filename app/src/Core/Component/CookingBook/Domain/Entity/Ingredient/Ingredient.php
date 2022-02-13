<?php
declare(strict_types=1);

namespace App\Core\Component\CookingBook\Domain\Entity\Ingredient;

use App\Core\Component\CookingBook\Domain\Entity\RecipeIngredient\RecipeIngredient;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Ingredient
{
    private int $id;

    /**
     * @var Collection
     */
    private Collection $recipeIngredients;

    public function __construct(
        private string $value
    ) {
        $this->recipeIngredients = new ArrayCollection([]);
    }

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
     * @return Collection
     */
    public function recipeIngredients(): Collection
    {
        return $this->recipeIngredients;
    }

    /**
     * @param Collection $recipeIngredients
     */
    public function setRecipeIngredients(Collection $recipeIngredients): void
    {
        $this->recipeIngredients = $recipeIngredients;
    }

    public function addRecipeIngredient(RecipeIngredient $recipeIngredient): void
    {
        $this->recipeIngredients->add($recipeIngredient);
        $recipeIngredient->setIngredient($this);
    }
}
