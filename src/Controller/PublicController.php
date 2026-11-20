<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PublicController extends AbstractController
{
    // L'attribut gère le routing
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        $nom = "Michaël";
        return $this->render('public/index.html.twig', [
            # ON EST ICI
            'controller_name' => 'PublicController',
            'nom' => $nom,
            'xss' => "<script> alert('xss attack!'); </script>",
            'monJS' => "<script> document.write('js accepté'); </script>",
        ]);
    }

    // le routing n'est pas présent ici
    public function contact(): Response
    {
        // Nous allons envoyer une réponse de type texte en utilisant la classe Response (html basique)
        return new Response('<h1>Page de contact</h1><a href="./">Retour à l\'accueil</a>');
    }
}
