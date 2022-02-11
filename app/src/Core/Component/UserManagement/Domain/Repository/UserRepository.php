<?php
declare(strict_types=1);

namespace App\Core\Component\UserManagement\Domain\Repository;

use App\Core\Component\UserManagement\Domain\Entity\User;
use App\Core\Port\Persistence\Exception\EmptyQueryResultException;

interface UserRepository
{
    public function add(User $user): void;

    /**
     * @param string $username
     * @return User
     *
     * @throws EmptyQueryResultException
     */
    public function findOneByUsername(string $username): User;

    /**
     * @param string $email
     * @return User
     *
     * @throws EmptyQueryResultException
     */
    public function findOneByEmail(string $email): User;

    /**
     * @return User[]
     */
    public function findAll(): array;

    public function findById(string $id): User;
}
