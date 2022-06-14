<?php

namespace App\Controller\Admin;

use App\Entity\Gite;
use App\Form\GiteType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class AdminController extends AbstractController 
{
    /**
     * @Route("/admin", name="admin_index")
     */
    public function index(ManagerRegistry $doctrine)
    {
        $repository = $doctrine->getRepository(Gite::class);
        $gites = $repository->findAll();

        return $this->render('admin/index.html.twig', [
            "menu" => "admin", 
            "gites" => $gites
        ]);
    }

    /**
     * @Route("/admin/gite/create", name="admin_gite_create")
     */
    public function create(ManagerRegistry $doctrine, Request $request)
    {
        $gite = new Gite();
        $form = $this->createForm(GiteType::class, $gite);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $entiteManager = $doctrine->getManager();
            $entiteManager->persist($gite); // only to create new lines in db before flush (useless when updating them)
            $entiteManager->flush();
            $this->addFlash('success', 'Votre gite a été créé avec succès.');
            return $this->redirectToRoute("admin_index");

        }

        return $this->render('admin/gite/create.html.twig', [
            "formGite" => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/gite/edit/{id}", name="admin_gite_edit")
     */
    public function edit(Gite $gite, Request $request, ManagerRegistry $doctrine)
    {
        $form = $this->createForm(GiteType::class, $gite);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $entiteManager = $doctrine->getManager();
            $entiteManager->flush();
            $this->addFlash('success', 'Modifications enregistrées avec succès.');
            return $this->redirectToRoute("admin_index");
        }

        return $this->render('admin/gite/edit.html.twig', [
            "formGite" => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/gite/delete/{id}", name="admin_gite_delete")
     */
    public function delete(Gite $gite, Request $request, ManagerRegistry $doctrine)
    {
        if($this->isCsrfTokenValid("gite_delete" . $gite->getId(), $request->request->get('token'))) 
        {
            $entiteManager = $doctrine->getManager();
            $entiteManager->remove($gite);
            $entiteManager->flush();
            $this->addFlash('success', 'Gite supprimé avec succès');
        } else {
            $this->addFlash('error', 'Erreur : token non valide');
        }

        return $this->redirectToRoute("admin_index");

    }

}
