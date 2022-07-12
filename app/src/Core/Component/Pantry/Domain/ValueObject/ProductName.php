<?php
declare(strict_types=1);

namespace App\Core\Component\Pantry\Domain\ValueObject;

use Assert\Assertion;
use Assert\AssertionFailedException;

final class ProductName
{
    const MIN_LENGTH = 3;
    const MAX_LENGTH = 60;

    /**
     * @param string $value
     * @throws AssertionFailedException
     */
    private function __construct(public readonly string $value)
    {
        Assertion::betweenLength($value, self::MIN_LENGTH, self::MAX_LENGTH);
    }

    /**
     * @param string $productName
     * @return static
     * @throws AssertionFailedException
     */
    public static function create(string $productName): self
    {
        return new self($productName);
    }
}
