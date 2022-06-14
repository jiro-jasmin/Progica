<?php

namespace App\Controller;

use App\Entity\Gite;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GiteController extends AbstractController
{
    /**
     * @Route("/gite/{id}", name="gite_show")
     */
    public function show(ManagerRegistry $doctrine, int $id)
    {
        $repo = $doctrine->getRepository(Gite::class);

        $gite = $repo->find($id);
    
        return $this->render('gite/show.html.twig', [
            "gite" => $gite
        ]);
    }
    
}