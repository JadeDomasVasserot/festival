<?php
/**
 * Contrôleur permettant de gérer l'index
 */
namespace App\Controller;

use App\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Festival;
use App\Entity\InscriptionRapide;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\InscriptionRapide2;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $festivals = $this->getDoctrine()
            ->getRepository(Festival::class)
            ->findAll();

        return $this->render('Index.html.twig', [
            'festivals' => $festivals,
        ]);
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
    public function inscriptionRapide(Request $request): Response
    {
        $festivals = $this->getDoctrine()
            ->getRepository(Festival::class)
            ->findAll();

        $InscriptionRapide = new InscriptionRapide;

        $form = $this->createFormBuilder($InscriptionRapide)
        ->add('prenom',TextType::class,[
            'attr' => ['class' => 'input--style-4' ],
            'label_attr' => ['class' => 'label' ]
        ])
        ->add('nom',TextType::class,[
            'attr' => ['class' => 'input--style-4' ],
            'label_attr' => ['class' => 'label' ]
        ])
        ->add('datenaissance',BirthdayType::class, array(
            'format' => 'dd-MM-yyyy','label_attr' => ['class' => 'label' ],'label' => 'Date de naissance')
           )
        ->add('adresse',TextType::class,[
            'attr' => ['class' => 'input--style-4' ],
            'label_attr' => ['class' => 'label' ]
        ])
        ->add('email',EmailType::class,[
            'attr' => ['class' => 'input--style-4' ],
            'label_attr' => ['class' => 'label' ]
        ])
        ->add('telephone',TelType::class,[
            'attr' => ['class' => 'input--style-4' ],
            'label_attr' => ['class' => 'label' ]
        ])
        ->add('sexe', ChoiceType::class, [
            'choices'  => [
                'Homme' => 'Homme',
                'Femme' => 'Femme'
            ],
            'label_attr' => ['class' => 'label' ],
            'label' =>'Sexe'
            
            
        ])
            ->add('Sauvegarder', SubmitType::class,[
            'attr'=> ['class' => 'btn btn--radius-2 btn--blue'],
        ])
            ->getForm();

        $form->handlerequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $InscriptionInfos = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($InscriptionInfos);
            $entityManager->flush();

            return $this->redirectToRoute('inscriptionRapide2',
                [ 'id' => $InscriptionRapide->getId()]);
        }

        return $this->render('inscriptionRapide.html.twig',
            [ 'festivals' => $festivals
                , 'form' => $form->createView()]);
    }

    /**
     * @Route("/inscriptionRapide2/{id}", name="inscriptionRapide2")
     */
    public function inscriptionRapide2(Request $request, $id): Response
    {
        $festivals = $this->getDoctrine()
            ->getRepository(Festival::class)
            ->findAll();

        $InscriptionRapide2 = new InscriptionRapide2;

        $form2 = $this->createFormBuilder($InscriptionRapide2)
            ->add('idclient',NumberType::class, array('data' => $id))
            ->add('idfestival')
           ->add('Sauvegarder', SubmitType::class,[
            'attr'=> ['class' => 'btn btn--radius-2 btn--blue'],
           ])
            ->getForm();

        $form2->handlerequest($request);

        if($form2->isSubmitted() && $form2->isValid()){
            $InscriptionInfos = $form2->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($InscriptionInfos);
            $entityManager->flush();

            return $this->render('inscriptionValide.html.twig');
        }

        return $this->render('inscriptionRapide.html.twig',
            [ 'festivals' => $festivals
                , 'form' => $form2->createView()]);


        return $this->render('inscription.html.twig') ;
    }


}


