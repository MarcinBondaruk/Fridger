<?php
declare(strict_types=1);

namespace App\Core\Component\CookingBook\Domain\Entity\Ingredient;

use Doctrine\ORM\PersistentCollection;

class Ingredient
{
    private int $id;

    /**
     * @var PersistentCollection
     */
    private PersistentCollection $recipeIngredients;

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
     * @return PersistentCollection
     */
    public function recipeIngredients(): PersistentCollection
    {
        return $this->recipeIngredients;
    }
}
