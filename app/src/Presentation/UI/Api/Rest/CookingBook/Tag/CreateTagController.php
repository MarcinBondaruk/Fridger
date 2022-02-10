<?php
declare(strict_types=1);

namespace App\Presentation\UI\Api\Rest\CookingBook\Tag;

use App\Core\Component\CookingBook\Application\Write\Command\CreateTagCommand\CreateTagCommand;
use App\Core\Port\Transport\CommandBus\ISyncCommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateTagController extends AbstractController
{
    #[Route(path: '/api/v1/tags', methods: ['POST'])]
    public function __invoke(
        ISyncCommandBus $commandBus,
        Request $request
    ): Response
    {
        $body = json_decode($request->getContent(), true);
        $commandBus->dispatch(new CreateTagCommand(
            $body['value']
        ));

        return new JsonResponse(data: '', status: Response::HTTP_CREATED, json: true);
    }
}
