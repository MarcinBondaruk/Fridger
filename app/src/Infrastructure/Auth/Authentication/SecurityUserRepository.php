<?php
declare(strict_types=1);

namespace App\Infrastructure\Auth\Authentication;

use App\Core\Component\UserManagement\Domain\Repository\UserRepository;

class SecurityUserRepository
{
    public function __construct(
        private UserRepository $userRepository
    ) {}

    public function getUser(string $username): SecurityUser
    {
        $user = $this->userRepository->findOneByUsername($username);
        return SecurityUser::fromUser($user);
    }
}
