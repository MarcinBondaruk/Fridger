<?php
declare(strict_types=1);

namespace App\Core\Component\UserManagement\Application\Read\Query\RetrieveUserDataQuery;

use App\Core\Component\UserManagement\Domain\Entity\User;
use App\Core\Component\UserManagement\Domain\Repository\UserRepository;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class RetrieveUserDataQueryHandler
{
    public function __construct(
        private UserRepository $userRepository
    ) {}

    public function __invoke(RetrieveUserDataQuery $query): RetrieveUserDataQueryResult
    {
        $user = $this->userRepository->findById($query->id());

        return $this->mapToResponse($user);
    }

    private function mapToResponse(User $user): RetrieveUserDataQueryResult
    {
        return RetrieveUserDataQueryResult::fromArray([
            'id' => $user->id(),
            'username' => $user->username(),
            'email' => $user->email()
        ]);
    }
}
