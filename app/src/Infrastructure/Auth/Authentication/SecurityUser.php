<?php
declare(strict_types=1);

namespace App\Infrastructure\Auth\Authentication;

use App\Core\Component\UserManagement\Domain\Entity\User;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class SecurityUser implements UserInterface, PasswordAuthenticatedUserInterface
{
    public function __construct(
        private string $id,
        private string $username,
        private string $password,
        private array $roles = []
    ) {}

    public static function fromUser(User $user): self
    {
        return new self($user->id(), $user->username(), $user->passwordHash(), $user->roles());
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function eraseCredentials(): void
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getUserIdentifier(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }
}
