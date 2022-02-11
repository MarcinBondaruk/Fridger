<?php
declare(strict_types=1);

namespace App\Presentation\UI\Api\Web;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserAccountController extends AbstractController
{
    #[Route(path: '/account', name: 'user_account', methods: ['GET'])]
    public function index(
        Request $request
    ): Response {
        dd($request);
        return $this->render('account/user-account.html.twig');
    }
}
