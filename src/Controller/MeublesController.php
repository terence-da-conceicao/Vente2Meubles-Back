<?php
// src/Controller/MeublesController.php
namespace App\Controller;

// les require
use App\Entity\Meubles; //la table meubles
use Doctrine\ORM\EntityManagerInterface; //gestionnaire de db
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\MeublesRepository;
//use Symfony\Component\HttpFoundation\Request;


class MeublesController extends AbstractController
{
    #[Route('/meubles', name: 'meubles_list')] // La route pour afficher la liste des meubles depuis la BDD
public function listMeubles(MeublesRepository $meublesRepository): Response
{
    // Récupérer tous les meubles de la base de données
    $meubles = $meublesRepository->findAll(); // findAll() est une méthode de la classe Repository qui renvoie tous les meubles

    // Renvoyer à une vue Twig (une page HTML) pour afficher la liste des meubles
    return $this->render('meubles/list.html.twig', [
        'meubles' => $meubles
    ]);
}


    // remplir la table meubles de la DB, pour le moment avec des données en dur
    #[Route('/add-meubles', name: 'create_meubles')]
    public function create_meubles(EntityManagerInterface $entityManager): Response
    {
        $meuble = new Meubles();
        $meuble->setType('meuble test');
        $meuble->setPrix(1337);
        $meuble->setCouleur('couleur');
        $meuble->setMatiere('matière');
        $meuble->setDimensions('X x Y x Z');
        $meuble->setPhotos('images/meuble-de-cuisine-2-portes-2-tiroirs-manguier-grand-tiroir.webp');

        // tell Doctrine you want to (eventually) save the meubles (no queries yet)
        $entityManager->persist($meuble);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new meuble with id '.$meuble->getId());
    }

    // modifier les données d'une entrée en DB
    #[Route('/change-meubles/{id}', name: 'modify_meubles')]
    public function modify_meubles (EntityManagerInterface $entityManager, int $id): Response 
    {   
        // trouver la bonne id
        $meuble = $entityManager->getRepository(Meubles::class)->find($id);

        // Vérifier si l'entité existe
        if (!$meuble) {
            return new Response('Meuble non trouvé', Response::HTTP_NOT_FOUND);
        }
        
        // Valeurs à modifier pour le formulaire 
        $meuble->getId($id);
        $meuble->setType('bureau');
        $meuble->setPrix(667);
        $meuble->setCouleur('bois');
        $meuble->setMatiere('bois');
        $meuble->setDimensions('120 x 50 x 70');
        $meuble->setPhotos('images/pexels-pnw-prod-8250979.jpg');

        $entityManager->flush();

        return new Response('Meuble '.$meuble->getId().' modifié');
    }

    // effacer une entrée en DB
    #[Route('/remove-meubles/{id}', name: 'remove_meubles')]
    public function remove_meubles (EntityManagerInterface $entityManager, int $id): Response
    {
        $meuble = $entityManager->getRepository(Meubles::class)->find($id);

        if (!$meuble) {
            return new Response('Meuble non trouvé', Response::HTTP_NOT_FOUND);
        }

        // supprime une entrée
        $entityManager->remove($meuble);
        $entityManager->flush();

        return new Response('Meuble '.$meuble->getId().' supprimé');
    }
}