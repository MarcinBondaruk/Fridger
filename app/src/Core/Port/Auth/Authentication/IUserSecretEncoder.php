<?php
declare(strict_types=1);

namespace App\Core\Port\Auth\Authentication;

interface IUserSecretEncoder
{
    public function encode(string $password): string;
}
