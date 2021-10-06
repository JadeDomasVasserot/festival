<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
}
