<?php
/**
 * Contrôleur permettant  d'associer une chanson à un chanteur
 */
namespace App\Controller;

use App\Entity\ChansonChanteur;
use App\Form\ChansonChanteurType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/chanson/chanteur")
 * Route pour accéder à contrôleur
 */
class ChansonChanteurController extends AbstractController
{
    /**
     * @Route("/", name="chanson_chanteur_index", methods={"GET"})
     * Affiche un tableau avec la chanson et le chanteur associé 
     * On peut cliquer sur la chanson afin d'accéder aux détails
     * Affiche la template chanson_chanteur/index
     */
    public function index(): Response
    {
        $chansonChanteurs = $this->getDoctrine()
            ->getRepository(ChansonChanteur::class)
            ->findAll();

        return $this->render('chanson_chanteur/index.html.twig', [
            'chanson_chanteurs' => $chansonChanteurs,
        ]);
    }

    /**
     * @Route("/new", name="chanson_chanteur_new", methods={"GET","POST"})
     * permet de créer une nouvelle association 
     * Affiche la template chanson_chanteur/new
     */
    public function new(Request $request): Response
    {
        $chansonChanteur = new ChansonChanteur();
        $form = $this->createForm(ChansonChanteurType::class, $chansonChanteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($chansonChanteur);
            $entityManager->flush();

            return $this->redirectToRoute('chanson_chanteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('chanson_chanteur/new.html.twig', [
            'chanson_chanteur' => $chansonChanteur,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="chanson_chanteur_show", methods={"GET"})
     * permet d'afficher les détails de l'association cliquée
     * Affiche la template chanson_chanteur/show
     */
    public function show(ChansonChanteur $chansonChanteur): Response
    {
        return $this->render('chanson_chanteur/show.html.twig', [
            'chanson_chanteur' => $chansonChanteur,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="chanson_chanteur_edit", methods={"GET","POST"})
     * permet de modifier les détails de l'association cliquée
     * Affiche la template chanson_chanteur/edit
     */
    public function edit(Request $request, ChansonChanteur $chansonChanteur): Response
    {
        $form = $this->createForm(ChansonChanteurType::class, $chansonChanteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('chanson_chanteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('chanson_chanteur/edit.html.twig', [
            'chanson_chanteur' => $chansonChanteur,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="chanson_chanteur_delete", methods={"POST"})
     * permet de supprimer l'association cliquée
     * Affiche la template chanson_chanteur/delete
     */
    public function delete(Request $request, ChansonChanteur $chansonChanteur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$chansonChanteur->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($chansonChanteur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('chanson_chanteur_index', [], Response::HTTP_SEE_OTHER);
    }
}
