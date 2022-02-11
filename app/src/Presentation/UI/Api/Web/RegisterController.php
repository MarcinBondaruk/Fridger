<?php
declare(strict_types=1);

namespace App\Presentation\UI\Api\Web;

use App\Core\Component\UserManagement\Application\Write\Command\CreateUserCommand;
use App\Core\Port\Transport\CommandBus\ISyncCommandBus;
use App\Core\SharedKernel\Exception\AppRuntimeException;
use Assert\AssertionFailedException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    #[Route(path: '/auth/register', name: 'register', methods: ['GET', 'POST'])]
    public function index(
        ISyncCommandBus $commandBus,
        Request $request
    ): Response {
        $error = null;

        if ($request->getMethod() === 'POST') {
            try {
                $body = $request->request->all();
                $commandBus->dispatch(new CreateUserCommand(
                    $body['username'],
                    $body['email'],
                    $body['password']
                ));

                return $this->render('account/user-account.html.twig', [
                    'error' => $error
                ]);
            } catch(AppRuntimeException | AssertionFailedException $e) {
                $error = $e->getMessage();
                return $this->render('auth/register.html.twig', [
                    'error' => $error
                ]);
            }
        }

        return $this->render('auth/register.html.twig', [
            'error' => $error
        ]);
    }
}
