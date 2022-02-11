<?php
declare(strict_types=1);

namespace App\Presentation\UI\Api\Web;

use App\Core\Component\UserManagement\Application\Read\Query\RetrieveUserDataQuery\RetrieveUserDataQuery;
use App\Core\Port\Transport\QueryBus\ISyncQueryBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserAccountController extends AbstractController
{
    #[Route(path: '/account', name: 'user_account', methods: ['GET'])]
    public function index(
        Request $request,
        ISyncQueryBus $queryBus
    ): Response {

        $userData = $queryBus->dispatch(new RetrieveUserDataQuery($this->getuser()->id()));

        return $this->render('account/user-account.html.twig', [
            'user' => $userData->toArray()
        ]);
    }
}
