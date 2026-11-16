<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PublicController extends AbstractController
{
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
}
