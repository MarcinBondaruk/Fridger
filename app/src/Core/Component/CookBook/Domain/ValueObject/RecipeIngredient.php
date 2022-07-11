<?php
declare(strict_types=1);

namespace App\Core\Component\CookBook\Domain\ValueObject;

use App\Core\Component\CookBook\Domain\Enum\RecipeIngredientUnit;
use Assert\Assertion;
use Assert\AssertionFailedException;

final class RecipeIngredient
{
    public readonly string  $ingredientId;
    public readonly RecipeIngredientUnit $unit;
    public readonly int $amount;

    /**
     * @param string $ingredientId
     * @param RecipeIngredientUnit $unit
     * @param int $amount
     * @throws AssertionFailedException
     */
    public function __construct(
        string $ingredientId,
        RecipeIngredientUnit $unit,
        int $amount
    ) {
        Assertion::uuid($ingredientId);
        Assertion::greaterThan($amount, 0);

        $this->ingredientId = $ingredientId;
        $this->unit = $unit;
        $this->amount = $amount;
    }

    /**
     * @param string $ingredientId
     * @param RecipeIngredientUnit $unit
     * @param int $amount
     * @return static
     * @throws AssertionFailedException
     */
    public static function create(string $ingredientId, RecipeIngredientUnit $unit, int $amount): self
    {
        return new self($ingredientId, $unit, $amount);
    }
}
