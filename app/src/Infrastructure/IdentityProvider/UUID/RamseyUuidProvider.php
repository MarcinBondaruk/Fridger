<?php
declare(strict_types=1);

namespace App\Infrastructure\IdentityProvider\UUID;

use App\Core\Port\IdentityProvider\IdentityProvider;
use Ramsey\Uuid\Uuid;

class RamseyUuidProvider implements IdentityProvider
{
    public function generate(): string
    {
        return Uuid::uuid4()->toString();
    }
}
