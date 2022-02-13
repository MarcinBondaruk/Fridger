<?php
declare(strict_types=1);

namespace App\Core\Component\CookingBook\Domain\Entity;

use App\Core\Component\CookingBook\Domain\Entity\RecipeIngredient\RecipeIngredient;
use App\Core\Component\CookingBook\Domain\Entity\Tag\Tag;

class Recipe
{
    /**
     * @param string $id
     * @param string $title
     * @param string $description
     * @param RecipeIngredient[] $recipeIngredients
     * @param Tag[] $tags
     */
    public function __construct(
        private string $id,
        private string $title,
        private string $description,
        private array $recipeIngredients,
        private array $tags = []
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
    public function tags(): array
    {
        return $this->tags;
    }

    /**
     * @return array
     */
    public function recipeIngredients(): array
    {
        return $this->recipeIngredients;
    }
}
