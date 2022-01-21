<?php
declare(strict_types=1);

namespace App\Core\Component\UserManagement\Domain\Repository;

use App\Core\Component\UserManagement\Domain\Entity\User;

interface UserRepository
{
    public function persist(User $user): void;
}
