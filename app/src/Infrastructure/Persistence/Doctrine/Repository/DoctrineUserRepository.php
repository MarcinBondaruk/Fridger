<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Core\Component\UserManagement\Domain\Entity\User;
use App\Core\Component\UserManagement\Domain\Repository\UserRepository;
use App\Core\Port\Persistence\Exception\EmptyQueryResultException;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineUserRepository implements UserRepository
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {}

    public function add(User $user): void
    {
        // TODO: Implement persist() method.
    }

    public function findOneByUsername(string $username): User
    {
        $user = $this->entityManager->getRepository(User::class)
            ->findOneBy(['username' => $username]);

        if (empty($user)) {
            throw new EmptyQueryResultException();
        }

        return $user;
    }

    public function findOneByEmail(string $email): User
    {
        $user = $this->entityManager->getRepository(User::class)
            ->findOneBy(['email' => $email]);

        if (empty($user)) {
            throw new EmptyQueryResultException();
        }

        return $user;
    }
}