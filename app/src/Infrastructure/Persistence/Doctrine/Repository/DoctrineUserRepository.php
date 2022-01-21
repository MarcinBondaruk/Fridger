<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Core\Component\UserManagement\Domain\Entity\User;
use App\Core\Component\UserManagement\Domain\Repository\UserRepository;

class DoctrineUserRepository implements UserRepository
{

    public function persist(User $user): void
    {
        // TODO: Implement persist() method.
    }
}
