<?php
declare(strict_types=1);

namespace App\Presentation\UI\Api\Rest\Users;

use App\Core\Component\UserManagement\Application\Write\Command\CreateUserCommand;
use App\Core\Port\Transport\CommandBus\ISyncCommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateUserController extends AbstractController
{
    #[Route('/api/v1/users', methods: ['POST'])]
    public function createUser(
        ISyncCommandBus $messageBus,
        Request $request
    ): JsonResponse {
        $body = json_decode($request->getContent(), true);

        $messageBus->dispatch(
            new CreateUserCommand(
                $body['username'],
                $body['email'],
                $body['password']
            )
        );

        return new JsonResponse(data: '', status: Response::HTTP_OK, json: true);
    }
}
