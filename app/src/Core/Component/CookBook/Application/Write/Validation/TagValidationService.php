<?php
declare(strict_types=1);

namespace App\Core\Component\CookBook\Application\Write\Validation;

use Assert\Assertion;

class TagValidationService
{
    public function validateValue(string $value): string
    {
        Assertion::notEmpty($value);
        Assertion::maxLength($value, 30, 'Tag should not exceed 30 characters.');
        Assertion::regex($value, '/^[\s\p{L}]+$/u', 'Tag must contain latin characters');
        return $value;
    }
}
