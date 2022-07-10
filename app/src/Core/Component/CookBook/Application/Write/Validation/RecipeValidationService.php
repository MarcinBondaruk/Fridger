<?php
declare(strict_types=1);

namespace App\Core\Component\CookBook\Application\Write\Validation;

use Assert\Assertion;

class RecipeValidationService
{
    public function validateTitle(string $title): string
    {
        Assertion::notEmpty($title);
        return $title;
    }

    public function validateDescription(string $description): string
    {
        Assertion::notEmpty($description);
        return $description;
    }

    public function validateIngredients(array $ingredientIds): array
    {
        Assertion::notEmpty($ingredientIds);
        Assertion::uniqueValues($ingredientIds);
        Assertion::allInteger($ingredientIds);
        return $ingredientIds;
    }

    public function validateTags(array $tagIds): array
    {
        Assertion::notEmpty($tagIds);
        Assertion::uniqueValues($tagIds);
        Assertion::allInteger($tagIds);
        return $tagIds;
    }
}
