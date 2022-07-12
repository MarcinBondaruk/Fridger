<?php
declare(strict_types=1);

namespace App\Core\SharedKernel\Domain\ValueObject;

use Assert\Assertion;
use Assert\AssertionFailedException;

final class ProductId
{
    public readonly string $value;

    /**
     * @param string $value
     * @throws AssertionFailedException
     */
    private function __construct(string $value)
    {
        Assertion::uuid($value);
        $this->value = $value;
    }

    public static function create(string $uuid): self
    {
        return new self($uuid);
    }

    public function isEqual(ProductId $otherId): bool
    {
        return $this->value === $otherId->value;
    }
}
