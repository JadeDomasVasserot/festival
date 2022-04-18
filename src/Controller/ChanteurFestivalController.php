<?php
/**
 * Contrôleur permettant de gerer l'association chanteurs/festivals
 */
namespace App\Controller;

use App\Entity\ChanteurFestival;
use App\Form\ChanteurFestivalType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Festival;
use App\Entity\Chanteur;

/**
 * @Route("/chanteurFestival")
 * route permettant d'accéder au controleur chanteurFestival
 */
class ChanteurFestivalController extends AbstractController
{
    /**
     * @Route("/", name="chanteur_festival_index", methods={"GET"})
     * affiche un tableau avec toutes les associations chanteurFestival
     */
    public function index(): Response
    {
        $chanteurFestivals = $this->getDoctrine()
            ->getRepository(ChanteurFestival::class)
            ->findAll();

        $festivals = $this->getDoctrine()
            ->getRepository(Festival::class)
            ->findAll();

        $chanteurs = $this->getDoctrine()
            ->getRepository(Chanteur::class)
            ->findAll();

        return $this->render('chanteur_festival/index.html.twig', [
            'chanteur_festivals' => $chanteurFestivals,
            'festivals' => $festivals,
            'chanteurs' => $chanteurs,
        ]);
    }

    /**
     * @Route("/new", name="chanteur_festival_new", methods={"GET","POST"})
     * permet de créer une nouvelle association
     */
    public function new(Request $request): Response
    {
        $chanteurFestival = new ChanteurFestival();
        $form = $this->createForm(ChanteurFestivalType::class, $chanteurFestival);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($chanteurFestival);
            $entityManager->flush();

            return $this->redirectToRoute('chanteur_festival_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('chanteur_festival/new.html.twig', [
            'chanteur_festival' => $chanteurFestival,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="chanteur_festival_show", methods={"GET"})
     * permet de voir les détails de l'assocaiton
     */
    public function show(ChanteurFestival $chanteurFestival): Response
    {
        return $this->render('chanteur_festival/show.html.twig', [
            'chanteur_festival' => $chanteurFestival,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="chanteur_festival_edit", methods={"GET","POST"})
     * permet d'éditer l'association
     */
    public function edit(Request $request, ChanteurFestival $chanteurFestival): Response
    {
        $form = $this->createForm(ChanteurFestivalType::class, $chanteurFestival);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('chanteur_festival_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('chanteur_festival/edit.html.twig', [
            'chanteur_festival' => $chanteurFestival,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="chanteur_festival_delete", methods={"POST"})
     * permet de supprimer une association
     */
    public function delete(Request $request, ChanteurFestival $chanteurFestival): Response
    {
        if ($this->isCsrfTokenValid('delete'.$chanteurFestival->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($chanteurFestival);
            $entityManager->flush();
        }

        return $this->redirectToRoute('chanteur_festival_index', [], Response::HTTP_SEE_OTHER);
    }
}
