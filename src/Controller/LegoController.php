<?php

/* indique où "vit" ce fichier */
namespace App\Controller;

/* indique l'utilisation du bon bundle pour gérer nos routes */

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Lego;

use App\Repository\LegoRepository ;

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

    public function home(LegoRepository $legoRepository) : Response
    {
        $legos = $legoRepository->findAll();
        $temp = "";
        foreach ($legos as $test) {
            $temp .= $this->renderView('lego.html.twig', ['lego' => $test]);
        }

        return new Response($temp); 
        
    }
    #[Route('/{collection}', name: 'filter_by_collection')]
    public function filter($collection, LegoRepository $legoRepository): Response
    {
        if ($collection == "creator_expert") {
            $collection = "Creator Expert";
        }
        if ($collection == "star_wars") {
            $collection = "Star Wars";
        }
        $legos = $legoRepository->findbycat($collection);
        $temp = "";
        foreach ($legos as $lego) {
            $temp .= $this->renderView('lego.html.twig', ['lego' => $lego]);
        }
        return new Response($temp);
    }

 
    
}


