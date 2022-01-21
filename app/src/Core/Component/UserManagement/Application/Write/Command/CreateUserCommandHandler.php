<?php
declare(strict_types=1);

namespace App\Core\Component\UserManagement\Application\Write\Command;

use App\Core\Component\UserManagement\Domain\Entity\User;
use App\Core\Component\UserManagement\Domain\Repository\UserRepository;
use App\Core\Port\IdentityProvider\IdentityProvider;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class CreateUserCommandHandler
{
    public function __construct(
        private IdentityProvider $identityProvider,
        private UserRepository $userRepository
    ) {}

    public function __invoke(CreateUser $command) {
        $this->userRepository->persist(
            new User(
                $this->identityProvider->generate(),
                $command->username(),
                $command->email(),
                $command->password()
            )
        );
    }
}
