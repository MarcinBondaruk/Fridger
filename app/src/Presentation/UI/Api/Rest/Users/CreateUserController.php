<?php
declare(strict_types=1);

namespace App\Presentation\UI\Api\Rest\Users;

use App\Core\Component\UserManagement\Application\Write\Command\CreateUser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class CreateUserController extends AbstractController
{
    #[Route('/api/v1/users', methods: ['POST'])]
    public function createUser(
        MessageBusInterface $messageBus,
        Request $request
    ): JsonResponse {
        $body = json_decode($request->getContent(), true);

        $messageBus->dispatch(
            new CreateUser(
                $body['username'],
                $body['email'],
                $body['password']
            )
        );

        return new JsonResponse(status: Response::HTTP_OK, json: true);
    }
}
