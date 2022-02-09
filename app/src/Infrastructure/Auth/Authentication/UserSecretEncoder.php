<?php
declare(strict_types=1);

namespace App\Infrastructure\Auth\Authentication;

use App\Core\Port\Auth\Authentication\IUserSecretEncoder;

class UserSecretEncoder implements IUserSecretEncoder
{
    public function encode(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
