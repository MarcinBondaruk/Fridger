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
     * @param string $productId
     * @param RecipeIngredientUnit $unit
     * @param int $amount
     * @throws AssertionFailedException
     */
    public function __construct(
        string $productId,
        RecipeIngredientUnit $unit,
        int $amount
    ) {
        Assertion::uuid($productId);
        Assertion::greaterThan($amount, 0);

        $this->ingredientId = $productId;
        $this->unit = $unit;
        $this->amount = $amount;
    }

    /**
     * @param string $productId
     * @param RecipeIngredientUnit $unit
     * @param int $amount
     * @return static
     * @throws AssertionFailedException
     */
    public static function create(string $productId, RecipeIngredientUnit $unit, int $amount): self
    {
        return new self($productId, $unit, $amount);
    }
}
