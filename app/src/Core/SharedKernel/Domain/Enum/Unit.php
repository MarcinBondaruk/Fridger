<?php
declare(strict_types=1);

namespace App\Core\SharedKernel\Domain\Enum;

enum Unit
{
    case GRAM;
    case MILLILITER;

    public function unit(): string
    {
        return match($this) {
            Unit::GRAM => 'g',
            Unit::MILLILITER => 'ml'
        };
    }
}
