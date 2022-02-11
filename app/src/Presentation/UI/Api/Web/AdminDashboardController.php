<?php
declare(strict_types=1);

namespace App\Presentation\UI\Api\Web;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminDashboardController extends AbstractController
{
    #[Route(path: '/admin', name: 'admin_dashboard', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('homepage.html.twig', [
            'a_variable' => 'test',
            'navigation' => [
                [
                    'href' => 'auth/login',
                    'caption' => 'login'
                ]
            ]
        ]);
    }
}
