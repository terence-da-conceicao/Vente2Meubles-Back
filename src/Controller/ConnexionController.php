<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ConnexionController extends AbstractController

    {
        #[Route('/login', name: 'app_login')]
        public function login()
        {
            return $this->render('security/login.html.twig');
        }
    }
        
        
        
        
        
            
        // dump('Dans le contrôleur login');
        // // $form = $this->createFormBuilder()
        // //     ->add('username', TextType::class)
        // //     ->add('password', PasswordType::class)
        // //     ->add('submit', SubmitType::class)
        // //     ->getForm();

        // // $form->handleRequest($request);

        // // if ($form->isSubmitted() && $form->isValid()) {
        // //     // Traitement de la connexion
        // //     // ...

        // //     // Redirection vers la page d'accueil
        // //     return $this->redirectToRoute('app_homepage');
        // // }

        // return $this->render('security/login.html.twig', [
        //     // 'form' => $form->createView(),
        // ]);
    
