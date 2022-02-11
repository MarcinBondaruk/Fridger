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
        $this->entityManager->persist($user);
    }

    public function findOneByUsername(string $username): User
    {
        $user = $this->entityManager->getRepository(User::class)
            ->findOneBy(['username' => $username]);

        if (empty($user)) {
            throw new EmptyQueryResultException("No user found matching username: {$username}.");
        }

        return $user;
    }

    public function findOneByEmail(string $email): User
    {
        $user = $this->entityManager->getRepository(User::class)
            ->findOneBy(['email' => $email]);

        if (empty($user)) {
            throw new EmptyQueryResultException("No user found matching email: {$email}.");
        }

        return $user;
    }

    public function findAll(): array
    {
        return $this->entityManager->getRepository(User::class)->findAll();
    }

    public function findById(string $id): User
    {
        return $this->entityManager->getRepository(User::class)->find($id);
    }
}
