<?php
declare(strict_types=1);

namespace App\Core\Component\UserManagement\Domain\Entity;

use Assert\Assertion;
use Assert\AssertionFailedException as AssertionFailedExceptionAlias;

class User
{
    public const ROLE_ADMIN = 'ROLE_ADMIN';
    public const ROLE_USER = 'ROLE_REGISTERED_USER';

    /**
     * @var string[]
     */
    private array $roles = [];

    public function __construct(
        private string $id,
        private string $username,
        private string $email,
        private string $passwordHash
    ) {
        $this->setBasicRole();
    }

    /**
     * @return string
     */
    public function username(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function email(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function passwordHash(): string
    {
        return $this->passwordHash;
    }

    public function roles(): array
    {
        return $this->roles;
    }

    /**
     * @param string $role
     * @return void
     * @throws AssertionFailedExceptionAlias
     */
    public function addRole(string $role): void
    {
        Assertion::notInArray($role, $this->roles());
        $this->roles[] = $role;
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }

    private function setBasicRole()
    {
        $this->addRole(static::ROLE_USER);
    }
}
