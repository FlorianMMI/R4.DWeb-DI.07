<?php

/* indique où "vit" ce fichier */
namespace App\Controller;

/* indique l'utilisation du bon bundle pour gérer nos routes */

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Lego;
use App\Service\LegoService;

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

    public function home(LegoService $legoService) : Response
    {
        $legos = $legoService->getLegos();
        $temp = "";
        foreach ($legos as $test) {
            $temp .= $this->renderView('lego.html.twig', ['lego' => $test]);
        }

        return new Response($temp); 
        
    }
    #[Route('/{collection}', name: 'filter_by_collection')]
    public function filter($collection, LegoService $legoService): Response
    {
        if ($collection == "creator_expert") {
            $collection = "Creator Expert";
        }
        if ($collection == "star_wars") {
            $collection = "Star Wars";
        }
        $legos = $legoService->getLegosCat($collection);
        $temp = "";
        foreach ($legos as $lego) {
            $temp .= $this->renderView('lego.html.twig', ['lego' => $lego]);
        }
        return new Response($temp);
    }

    // #[Route('/creator', name : 'me')]
    // public function creator(LegoService $legoService) : Response
    // {
    //     $legos = $legoService->getLegosCat("creator");
    //     $temp = "";
    //     foreach ($legos as $test) {
    //         $temp .= $this->renderView('lego.html.twig', ['lego' => $test]);
    //     }

    //     return new Response($temp); 
    // }

    // #[Route('/star_wars', name : 'starwars')]
    // public function starwars(LegoService $legoService) : Response
    // {
    //     $legos = $legoService->getLegosCat("Star Wars");
    //     $temp = "";
    //     foreach ($legos as $test) {
    //         $temp .= $this->renderView('lego.html.twig', ['lego' => $test]);
    //     }

    //     return new Response($temp); 
    // }

    // #[Route('/creator_expert', name : 'creator_expert')]
    // public function creator_expert(LegoService $legoService) : Response
    // {
    //     $legos = $legoService->getLegosCat("Creator Expert");
    //     $temp = "";
    //     foreach ($legos as $test) {
    //         $temp .= $this->renderView('lego.html.twig', ['lego' => $test]);
    //     }

    //     return new Response($temp); 
    // }
    
}


