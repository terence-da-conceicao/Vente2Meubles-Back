<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        // Vérifier si l'utilisateur est connecté
        $user = $this->getUser();
        
        if ($user) {
            // Si l'utilisateur est connecté, afficher un message de bienvenue
            return $this->render('homepage/index.html.twig', [
                'user' => $user
            ]);
        } else {
            // Si l'utilisateur n'est pas connecté, lui demander de se connecter
            return $this->render('homepage/index.html.twig', [
                'user' => null
            ]);
        }
    }
}
