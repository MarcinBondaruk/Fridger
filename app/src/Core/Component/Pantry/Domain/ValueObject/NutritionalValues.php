<?php
declare(strict_types=1);

namespace App\Core\Component\Pantry\Domain\ValueObject;

use Assert\Assertion;

/**
 * in grams per 100 [unit]
 */
class NutritionalValues
{
    const MIN_AMOUNT = 0;

    public readonly float $proteins;
    public readonly float $carbohydrates;
    public readonly float $fats;

    private function __construct(
        float $proteins,
        float $carbohydrates,
        float $fats
    ) {
        Assertion::greaterOrEqualThan($proteins, self::MIN_AMOUNT);
        Assertion::greaterOrEqualThan($carbohydrates, self::MIN_AMOUNT);
        Assertion::greaterOrEqualThan($fats, self::MIN_AMOUNT);

        $this->proteins = $proteins;
        $this->carbohydrates = $carbohydrates;
        $this->fats = $fats;
    }

    public static function create(float $proteins, float $carbohydrates, float $fats): self
    {
        return new self($proteins, $carbohydrates, $fats);
    }
}
