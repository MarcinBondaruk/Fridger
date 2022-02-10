<?php
declare(strict_types=1);

namespace App\Core\Component\CookingBook\Application\Write\Validation;

use Assert\Assertion;

class TagValidationService
{
    public function validateValue(string $value): string
    {
        Assertion::notEmpty($value);
        Assertion::maxLength($value, 30, 'Tag should not exceed 30 characters.');
        Assertion::regex($value, '/^[A-Za-z ]+$/', 'Username must contain latin characters');
        return $value;
    }
}
