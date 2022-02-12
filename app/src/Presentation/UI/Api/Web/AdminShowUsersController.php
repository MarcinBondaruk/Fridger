<?php
declare(strict_types=1);

namespace App\Presentation\UI\Api\Web;

use App\Core\Component\UserManagement\Application\Read\Query\RetrieveUsersQuery;
use App\Core\Port\Transport\QueryBus\ISyncQueryBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminShowUsersController extends AbstractController
{
    #[Route(path: '/admin/show-users', name: 'show-users', methods: ['GET'])]
    public function index(
        ISyncQueryBus $queryBus
    ): Response {
        $error = null;

        $users = $queryBus->dispatch(new RetrieveUsersQuery());

        return $this->render('admin/show-users.html.twig', [
            'error' => $error,
            'users' => $users->toArray()
        ]);
    }
}

