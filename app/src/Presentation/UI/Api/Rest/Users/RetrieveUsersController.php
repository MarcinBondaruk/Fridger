<?php
declare(strict_types=1);

namespace App\Presentation\UI\Api\Rest\Users;

use App\Core\Component\UserManagement\Application\Read\Query\RetrieveUsersQuery;
use App\Core\Port\Transport\QueryBus\ISyncQueryBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RetrieveUsersController extends AbstractController
{
    #[Route('/api/v1/users', methods: ['GET'])]
    public function retrieveUsers(
        ISyncQueryBus $queryBus,
    ): Response {
        $result = $queryBus->dispatch(new RetrieveUsersQuery());

        return new JsonResponse($result->toString(), status: Response::HTTP_OK, json: true);
    }
}
