<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin_dashboard')]
    #[IsGranted('ROLE_ADMIN')]
    public function index(): Response
    {
        // Vérifier si l'utilisateur a le rôle ROLE_ADMIN
        if ($this->isGranted('ROLE_ADMIN')) {
            return new Response('Vous êtes admin.');
        }

        return new Response('Accès refusé.', Response::HTTP_FORBIDDEN);
    }
}
