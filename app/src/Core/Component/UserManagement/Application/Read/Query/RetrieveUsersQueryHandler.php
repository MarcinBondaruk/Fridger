<?php
declare(strict_types=1);

namespace App\Core\Component\UserManagement\Application\Read\Query;

use App\Core\Component\UserManagement\Domain\Entity\User;
use App\Core\Component\UserManagement\Domain\Repository\UserRepository;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class RetrieveUsersQueryHandler
{
    public function __construct(
        private UserRepository $userRepository
    ) {}

    public function __invoke(RetrieveUsersQuery $query): RetrieveUsersQueryResult
    {
        $users = $this->userRepository->findAll();
        return $this->mapToResult($users);
    }

    /**
     * @param User[] $users
     * @return RetrieveUsersQueryResult
     */
    private function mapToResult(array $users): RetrieveUsersQueryResult
    {
        /** @var User $user */
        $result = array_map(function($user) {
            return [
                'id' => $user->id(),
                'username' => $user->username(),
                'email' => $user->email(),
                'roles' => $user->roles()
            ];
        }, $users);

        return RetrieveUsersQueryResult::fromArray($result);
    }
}
