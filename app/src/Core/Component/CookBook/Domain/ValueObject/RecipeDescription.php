<?php
declare(strict_types=1);

namespace App\Core\Component\CookBook\Domain\ValueObject;

use Assert\Assertion;

final class RecipeDescription
{
    const MIN_LENGTH = 100;
    const MAX_LENGTH = 2000;

    public readonly string $value;

    private function __construct(string $value)
    {
        Assertion::betweenLength($value, self::MIN_LENGTH, self::MAX_LENGTH);
        $this->value = $value;
    }

    public static function create(string $description): self
    {
        return new self($description);
    }
}
