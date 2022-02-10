<?php
declare(strict_types=1);

namespace App\Core\Component\CookingBook\Domain\Entity\Tag;

class Tag
{
    private int $id;

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
}
