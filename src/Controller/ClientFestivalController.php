<?php

namespace App\Controller;

use App\Entity\ClientFestival;
use App\Form\ClientFestivalType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/client/festival")
 */
class ClientFestivalController extends AbstractController
{
    /**
     * @Route("/", name="client_festival_index", methods={"GET"})
     */
    public function index(): Response
    {
        $clientFestivals = $this->getDoctrine()
            ->getRepository(ClientFestival::class)
            ->findAll();

        return $this->render('client_festival/index.html.twig', [
            'client_festivals' => $clientFestivals,
        ]);
    }

    /**
     * @Route("/new", name="client_festival_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $clientFestival = new ClientFestival();
        $form = $this->createForm(ClientFestivalType::class, $clientFestival);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($clientFestival);
            $entityManager->flush();

            return $this->redirectToRoute('client_festival_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('client_festival/new.html.twig', [
            'client_festival' => $clientFestival,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="client_festival_show", methods={"GET"})
     */
    public function show(ClientFestival $clientFestival): Response
    {
        return $this->render('client_festival/show.html.twig', [
            'client_festival' => $clientFestival,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="client_festival_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ClientFestival $clientFestival): Response
    {
        $form = $this->createForm(ClientFestivalType::class, $clientFestival);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('client_festival_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('client_festival/edit.html.twig', [
            'client_festival' => $clientFestival,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="client_festival_delete", methods={"POST"})
     */
    public function delete(Request $request, ClientFestival $clientFestival): Response
    {
        if ($this->isCsrfTokenValid('delete'.$clientFestival->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($clientFestival);
            $entityManager->flush();
        }

        return $this->redirectToRoute('client_festival_index', [], Response::HTTP_SEE_OTHER);
    }
}
