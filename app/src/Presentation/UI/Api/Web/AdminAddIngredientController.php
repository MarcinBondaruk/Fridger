<?php
declare(strict_types=1);

namespace App\Presentation\UI\Api\Web;

use App\Core\Component\CookingBook\Application\Write\Command\CreateIngredientCommand\CreateIngredientCommand;
use App\Core\Port\Transport\CommandBus\ISyncCommandBus;
use App\Core\SharedKernel\Exception\AppRuntimeException;
use Assert\AssertionFailedException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminAddIngredientController extends AbstractController
{
    #[Route(path: '/admin/addingredient', name: 'addingredient', methods: ['GET', 'POST'])]
    public function index(
        ISyncCommandBus $commandBus,
        Request $request
    ): Response {
        $error = null;

        if ($request->getMethod() === 'POST') {
            try {
                $body = $request->request->all();
                $commandBus->dispatch(new CreateIngredientCommand(
                    $body['ingredient']
                ));

                return $this->render('admin/add-ingredient.html.twig', [
                    'success' => true,
                    'error' => $error
                ]);
            } catch(AppRuntimeException | AssertionFailedException $e) {
                $error = $e->getMessage();
                return $this->render('admin/add-ingredient.html.twig', [
                    'error' => $error,
                    'success' => false
                ]);
            }
        }

        return $this->render('admin/add-ingredient.html.twig', [
            'error' => $error,
            'success' => false
        ]);
    }
}
