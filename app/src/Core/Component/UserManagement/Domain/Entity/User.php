<?php
declare(strict_types=1);

namespace App\Core\Component\UserManagement\Domain\Entity;

use Assert\Assertion;

class User
{
    public function __construct(
        private string $id,
        private string $username,
        private string $email,
        private string $passwordHash
    ) {
        $this->setEmail($email);
        $this->setUsername($this->username);
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

    private function setEmail(string $email): void
    {
        Assertion::email($email);
        $this->email = $email;
    }

    private function setUsername(string $username): void
    {
        Assertion::notEmpty($username);
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }
}
