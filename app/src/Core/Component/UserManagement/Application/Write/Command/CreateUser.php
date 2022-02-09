<?php
declare(strict_types=1);

namespace App\Core\Component\UserManagement\Application\Write\Command;

use App\Core\Port\Transport\CommandBus\Command;

class CreateUser implements Command
{
    public function __construct(
        private string $username,
        private string $email,
        private string $plainPassword
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
    public function plainPassword(): string
    {
        return $this->plainPassword;
    }
}
