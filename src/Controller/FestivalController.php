<?php
/**
 * Contrôleur permettant de gerer les festivals
 */
namespace App\Controller;

use App\Entity\Festival;
use App\Form\FestivalType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/festival")*
 * Route pour accéder à un contrôleur festival
 */
class FestivalController extends AbstractController
{
    /**
     * @Route("/", name="festival_index", methods={"GET"})
     * affiche un tableau avec tous les festivals
     */
    public function index(): Response
    {
        $festivals = $this->getDoctrine()
            ->getRepository(Festival::class)
            ->findAll();

        return $this->render('festival/index.html.twig', [
            'festivals' => $festivals,
        ]);
    }

    /**
     * @Route("/new", name="festival_new", methods={"GET","POST"})
     * permet d'ajouter un festival
     */
    public function new(Request $request): Response
    {
        $festival = new Festival();
        $form = $this->createForm(FestivalType::class, $festival);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($festival);
            $entityManager->flush();

            return $this->redirectToRoute('festival_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('festival/new.html.twig', [
            'festival' => $festival,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="festival_show", methods={"GET"})
     * permet de voir les détails du festival sélectionnée
     */
    public function show(Festival $festival): Response
    {
        return $this->render('festival/show.html.twig', [
            'festival' => $festival,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="festival_edit", methods={"GET","POST"})
     * permet d'éditer les info d'un festival
     */
    public function edit(Request $request, Festival $festival): Response
    {
        $form = $this->createForm(FestivalType::class, $festival);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('festival_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('festival/edit.html.twig', [
            'festival' => $festival,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="festival_delete", methods={"POST"})
     * permet de supprimer un festival sélectionné
     */
    public function delete(Request $request, Festival $festival): Response
    {
        if ($this->isCsrfTokenValid('delete'.$festival->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($festival);
            $entityManager->flush();
        }

        return $this->redirectToRoute('festival_index', [], Response::HTTP_SEE_OTHER);
    }
}
