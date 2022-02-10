<?php
declare(strict_types=1);

namespace App\Presentation\UI\Api\Rest\CookingBook\Ingredient;

use App\Core\Component\CookingBook\Application\Write\Command\CreateIngredientCommand\CreateIngredientCommand;
use App\Core\Port\Transport\CommandBus\ISyncCommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateIngredientController extends AbstractController
{
    #[Route(path: '/api/v1/ingredients', methods: ['POST'])]
    public function createIngredient(
        ISyncCommandBus $commandBus,
        Request $request
    ): Response {
        $body = json_decode($request->getContent(), true);
        $commandBus->dispatch(new CreateIngredientCommand(
            $body['value']
        ));

        return new JsonResponse(data: '', status: Response::HTTP_CREATED, json: true);
    }
}
