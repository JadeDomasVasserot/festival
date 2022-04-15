<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
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
            ->add('sexe',ChoiceType::class,[
                'label_attr' => ['class' => 'label' ],
                'label' =>'Sexe',
                'choices'=> ['Homme' => 'Homme','Femme' => 'Femme'],
                'attr'=> ['class' => 'input--style-4'],
                'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
