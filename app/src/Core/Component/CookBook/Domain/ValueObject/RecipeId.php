<?php
declare(strict_types=1);

namespace App\Core\Component\CookBook\Domain\ValueObject;

use Assert\Assertion;
use Assert\AssertionFailedException;

final class RecipeId
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

    public function isEqual(RecipeId $otherId): bool
    {
        return $this->value === $otherId->value;
    }
}
