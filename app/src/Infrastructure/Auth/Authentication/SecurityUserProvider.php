<?php
declare(strict_types=1);

namespace App\Infrastructure\Auth\Authentication;

use App\Core\SharedKernel\Exception\AppRuntimeException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class SecurityUserProvider implements UserProviderInterface
{
    public function __construct(
        private SecurityUserRepository $userProvider
    ) {}

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof SecurityUser) {
            $userClass = get_class($user);
            throw new AppRuntimeException("Instances of {$userClass} are not supported.");
        }

        return $this->loadUserByIdentifier($user->getUserIdentifier());
    }

    public function supportsClass(string $class)
    {
        return $class === SecurityUser::class;
    }

    public function loadUserByIdentifier(string $identifier): UserInterface
    {
        return $this->userProvider->getUser($identifier);
    }
}
