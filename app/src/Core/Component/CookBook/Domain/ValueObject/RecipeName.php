<?php
declare(strict_types=1);

namespace App\Core\Component\CookBook\Domain\ValueObject;

use Assert\Assertion;
use Assert\AssertionFailedException;

class RecipeName
{
    const MIN_LENGTH = 6;
    const MAX_LENGTH = 120;

    /**
     * @param string $value
     * @throws AssertionFailedException
     */
    private function __construct(public readonly string $value)
    {
        Assertion::betweenLength($value, static::MIN_LENGTH, static::MAX_LENGTH);
    }

    /**
     * @param string $recipeName
     * @return static
     * @throws AssertionFailedException
     */
    public static function create(string $recipeName): self
    {
        return new self($recipeName);
    }
}
