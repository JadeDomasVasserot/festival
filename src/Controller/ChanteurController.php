<?php
/**
 * Contrôleur permettant de gerer les chanteurs
 */
namespace App\Controller;

use App\Entity\Chanteur;
use App\Form\ChanteurType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/chanteur")
 *  Route pour accéder à contrôleur chanteur
 */
class ChanteurController extends AbstractController
{
    /**
     * @Route("/", name="chanteur_index", methods={"GET"})
     * Affiche un tableau avec tous les chanteurs
     */
    public function index(): Response
    {
        $chanteurs = $this->getDoctrine()
            ->getRepository(Chanteur::class)
            ->findAll();

        return $this->render('chanteur/index.html.twig', [
            'chanteurs' => $chanteurs,
        ]);
    }

    /**
     * @Route("/new", name="chanteur_new", methods={"GET","POST"})
     * permet de créer un chanteur
     */
    public function new(Request $request): Response
    {
        $chanteur = new Chanteur();
        $form = $this->createForm(ChanteurType::class, $chanteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($chanteur);
            $entityManager->flush();

            return $this->redirectToRoute('chanteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('chanteur/new.html.twig', [
            'chanteur' => $chanteur,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="chanteur_show", methods={"GET"})
     * permet de voir les détails du chanteur selectionné
     */
    public function show(Chanteur $chanteur): Response
    {
        return $this->render('chanteur/show.html.twig', [
            'chanteur' => $chanteur,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="chanteur_edit", methods={"GET","POST"})
     * permet d'éditer les détails du chanteur selectionné
     */
    public function edit(Request $request, Chanteur $chanteur): Response
    {
        $form = $this->createForm(ChanteurType::class, $chanteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('chanteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('chanteur/edit.html.twig', [
            'chanteur' => $chanteur,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="chanteur_delete", methods={"POST"})
     * permet de supprimer le chanteur selectionné
     */
    public function delete(Request $request, Chanteur $chanteur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$chanteur->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($chanteur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('chanteur_index', [], Response::HTTP_SEE_OTHER);
    }
}
