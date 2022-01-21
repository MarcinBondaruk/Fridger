<?php
declare(strict_types=1);

namespace App\Core\Component\UserManagement\Application\Write\Command;

class CreateUser
{
    public function __construct(
        private string $username,
        private string $email,
        private string $password
    ) {}

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
    public function password(): string
    {
        return $this->password;
    }
}
