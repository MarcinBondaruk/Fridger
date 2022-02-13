<?php
declare(strict_types=1);

namespace App\Core\Component\CookingBook\Domain\Entity;

use App\Core\Component\CookingBook\Domain\Entity\Ingredient\Ingredient;
use App\Core\Component\CookingBook\Domain\Entity\RecipeIngredient\RecipeIngredient;
use App\Core\Component\CookingBook\Domain\Entity\Tag\Tag;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Recipe
{
    private Collection $recipeIngredients;

    /**
     * @param string $id
     * @param string $title
     * @param string $description
     * @param array $ingredients
     * @param Tag[] $tags
     */
    public function __construct(
        private string $id,
        private string $title,
        private string $description,
        private array $ingredients,
        private array $tags = []
    ) {
        $this->recipeIngredients = new ArrayCollection([]);
    }

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
    public function tags(): array
    {
        return $this->tags;
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
        $recipeIngredient->setRecipe($this);
    }

    /**
     * @return Ingredient[]
     */
    public function ingredients(): array
    {
        return $this->ingredients;
    }
}
