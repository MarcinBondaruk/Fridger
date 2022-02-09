<?php
declare(strict_types=1);

namespace App\Core\Component\UserManagement\Application\Write\Validation;

use Assert\Assertion;

class UserValidationService
{
    public function validateUsername(string $username): string
    {
        Assertion::notEmpty($username);
        Assertion::regex($username, '/^[0-9A-Za-z_]+$/', 'Username must contain latin characters, numbers or undersocres');
        return $username;
    }

    public function validatePassword(string $password):string
    {
        Assertion::notEmpty($password, 'Password must not be empty.');
        Assertion::minLength($password, 8, 'Password must be at least 8 characters long.');
        return $password;
    }

    public function validateEmail(string $email): string
    {
        Assertion::email($email, 'Email must be a valid email address');
        return $email;
    }
}
