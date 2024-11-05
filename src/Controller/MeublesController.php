<?php
// src/Controller/MeublesController.php
namespace App\Controller;

// ...
use App\Entity\Meubles;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MeublesController extends AbstractController
{
    #[Route('/meubles', name: 'create_meubles')]
    public function createmeubles(EntityManagerInterface $entityManager): Response
    {
        $meubles = new Meubles();
        $meubles->setType('WC');
        $meubles->setPrix(200);
        $meubles->setCouleur('gris');
        $meubles->setMatiere('taule');
        $meubles->setDimensions('10 x 10 x 10');

        // tell Doctrine you want to (eventually) save the meubles (no queries yet)
        $entityManager->persist($meubles);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new meubles with id '.$meubles->getId());
    }
}
