<?php
declare(strict_types=1);

namespace App\Presentation\UI\Api\Rest\CookingBook\Ingredient;

use App\Core\Component\CookingBook\Application\Read\Query\RetrieveIngredientsQuery\RetrieveIngredientsQuery;
use App\Core\Port\Transport\QueryBus\ISyncQueryBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RetrieveIngredientsController extends AbstractController
{

    #[Route('/api/v1/ingredients', methods: ['GET'])]
    public function retrieveIngredients(
        ISyncQueryBus $queryBus,
    ): Response {
        $result = $queryBus->dispatch(new RetrieveIngredientsQuery());

        return new JsonResponse($result->toString(), status: Response::HTTP_OK, json: true);
    }
}
