<?php

/* indique où "vit" ce fichier */
namespace App\Controller;

/* indique l'utilisation du bon bundle pour gérer nos routes */

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Lego;


/* le nom de la classe doit être cohérent avec le nom du fichier */
class LegoController extends AbstractController
{
    // L'attribute #[Route] indique ici que l'on associe la route
    // "/" à la méthode home() pour que Symfony l'exécute chaque fois
    // que l'on accède à la racine de notre site.

    #[Route('/', name: 'home')]
    // public function home() :Response
    // {
    //     $msg = "Hello World !";
    //     return $this->render('test.html.twig', ['msg' => $msg]); // Il part du pricipe que le fichier twig est dans le dossier templates
    // }

    public function home() : Response
    {
        $lego = new Lego(
            10252,
            "La coccinelle Volkwagen",
            "Creator Expert"
        );
        $lego->setDescription("Construis une réplique LEGO® Creator Expert de l'automobile la plus populaire au monde. Ce magnifique modèle LEGO est plein de détails authentiques qui capturent le charme et la personnalité de la voiture, notamment un coloris bleu ciel, des ailes arrondies, des jantes blanches avec des enjoliveurs caractéristiques, des phares ronds et des clignotants montés sur les ailes.");
        $lego->setPrice(94.99);
        $lego->setPieces(1167);
        $lego->setboxImage("LEGO_10252_Box.png");
        $lego->setlegoImage("LEGO_10252_Main.jpg");

        return $this->render('lego.html.twig', ['lego' => $lego]);
    }

    #[Route('/me', name : 'me')]
    public function me()
    {
        die ("Florian");
    }
}


