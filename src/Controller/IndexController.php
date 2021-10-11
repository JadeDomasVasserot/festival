<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Festival;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index(): Response
    {
        return $this->render('Index.html.twig') ;
    }

    /**
     * @Route("/inscription", name="inscription")
     */
    public function inscription(): Response
    {
        return $this->render('inscription.html.twig') ;
    }

    /**
     * @Route("/inscriptionRapide", name="inscriptionRapide")
     */
    public function inscriptionRapide(): Response
    {
        $festivals = $this->getDoctrine()
            ->getRepository(Festival::class)
            ->findAll();
        return $this->render('inscriptionRapide.html.twig',[ 'festivals' => $festivals]);
    }


}
