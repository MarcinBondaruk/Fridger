<?php
declare(strict_types=1);

namespace App\Core\Component\UserManagement\Application\Write\Command;

use App\Core\Component\UserManagement\Application\Write\Validation\UserValidationService;
use App\Core\Component\UserManagement\Domain\Entity\User;
use App\Core\Component\UserManagement\Domain\Repository\UserRepository;
use App\Core\Port\Auth\Authentication\IUserSecretEncoder;
use App\Core\Port\IdentityProvider\IdentityProvider;
use App\Core\Port\Persistence\Exception\EmptyQueryResultException;
use App\Core\SharedKernel\Exception\AppRuntimeException;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class CreateAdminCommandHandler
{
    public function __construct(
        private IdentityProvider $identityProvider,
        private UserRepository $userRepository,
        private UserValidationService $validator,
        private IUserSecretEncoder $encoder
    ) {}

    public function __invoke(CreateAdminCommand $command)
    {
        $this->validateUserData($command->plainPassword(), $command->username(), $command->email());
        $newUser = new User(
            $this->identityProvider->generate(),
            $command->username(),
            $command->email(),
            $this->encoder->encode($command->plainPassword())
        );
        $newUser->promoteToAdmin();
        $this->userRepository->add($newUser);
    }

    private function validateUserData(string $password, string $username, string $email): void
    {
        if ($this->usernameExists($username)) {
            throw new AppRuntimeException("User with username {$username} already exists.");
        }

        if ($this->emailExists($email)) {
            throw new AppRuntimeException("Email {$email} in use");
        }

        $this->validator->validateEmail($email);
        $this->validator->validatePassword($password);
    }

    private function usernameExists(string $username): bool
    {
        try {
            $this->userRepository->findOneByUsername($username);

            return true;
        } catch(EmptyQueryResultException $e) {
            return false;
        }
    }

    private function emailExists(string $email): bool
    {
        try {
            $this->userRepository->findOneByEmail($email);

            return true;
        } catch(EmptyQueryResultException $e) {
            return false;
        }
    }
}
