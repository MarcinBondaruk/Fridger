<?php
declare(strict_types=1);

namespace App\Core\Port\IdentityProvider;

interface IdentityProvider
{
    public function generate(): string;
}
