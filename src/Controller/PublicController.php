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

            'title' => "Homepage",
            'controller_name' => 'PublicController',
            'nom' => $nom,
            'xss' => "<script> alert('xss attack!'); </script>",
            'monJS' => "<script> document.write('js accepté'); </script>",
        ]);
    }

    // le routing n'est pas présent ici
    // mais est présent dans config/routes.yaml
    public function contact(): Response
    {
        return $this->render('public/contact.html.twig', [
            'title' => "Contact",
        ]);
    }
}
