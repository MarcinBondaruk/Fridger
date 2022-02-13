<?php
declare(strict_types=1);

namespace App\Presentation\UI\Api\Web;

use App\Core\Component\CookingBook\Application\Read\Query\RetrieveIngredientsQuery\RetrieveIngredientsQuery;
use App\Core\Component\CookingBook\Application\Write\Command\CreateRecipeCommand\CreateRecipeCommand;
use App\Core\Port\Transport\CommandBus\ISyncCommandBus;
use App\Core\Port\Transport\QueryBus\ISyncQueryBus;
use App\Core\SharedKernel\Exception\AppRuntimeException;
use Assert\AssertionFailedException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminAddRecipeController extends AbstractController
{
    #[Route(path: '/admin/add-recipe', name: 'add-recipe', methods: ['GET', 'POST'])]
    public function index(
        ISyncCommandBus $commandBus,
        ISyncQueryBus $queryBus,
        Request $request
    ): Response {
        $error = null;
        $ingredients = $queryBus->dispatch(new RetrieveIngredientsQuery());

        if ($request->getMethod() === 'POST') {
            try {
                $body = $request->request->all();

                $commandBus->dispatch(new CreateRecipeCommand(
                    $body['title'],
                    $body['description'],
                    array_map(function ($id) {
                        return (int)$id;
                    }, $body['ingredients'])
                ));

                return $this->render('admin/add-recipe.html.twig', [
                    'ingredients' => $ingredients->toArray(),
                    'success' => true,
                    'error' => $error
                ]);
            } catch(AppRuntimeException | AssertionFailedException $e) {
                $error = $e->getMessage();
                return $this->render('admin/add-recipe.html.twig', [
                    'ingredients' => $ingredients->toArray(),
                    'error' => $error,
                    'success' => false
                ]);
            }
        }

        return $this->render('admin/add-recipe.html.twig', [
            'ingredients' => $ingredients->toArray(),
            'error' => $error,
            'success' => false
        ]);
    }
}
