<?php
declare(strict_types=1);

namespace App\Core\Component\CookBook\Domain\Enum;

enum RecipeIngredientUnit
{
    case GRAM;
    case MILLILITER;

    public function unit(): string
    {
        return match($this) {
            RecipeIngredientUnit::GRAM => 'g',
            RecipeIngredientUnit::MILLILITER => 'ml'
        };
    }
}
