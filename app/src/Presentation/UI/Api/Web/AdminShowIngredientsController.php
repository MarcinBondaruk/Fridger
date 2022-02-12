<?php
declare(strict_types=1);

namespace App\Presentation\UI\Api\Web;

use App\Core\Component\CookingBook\Application\Read\Query\RetrieveIngredientsQuery\RetrieveIngredientsQuery;
use App\Core\Port\Transport\QueryBus\ISyncQueryBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminShowIngredientsController extends AbstractController
{
    #[Route(path: '/admin/available-ingredients', name: 'available-ingredients', methods: ['GET'])]
    public function index(
        ISyncQueryBus $queryBus
    ): Response {
        $error = null;

        $ingredientsResult = $queryBus->dispatch(new RetrieveIngredientsQuery());

        return $this->render('admin/available-ingredients.html.twig', [
            'error' => $error,
            'ingredients' => $ingredientsResult->toArray()
        ]);
    }
}

