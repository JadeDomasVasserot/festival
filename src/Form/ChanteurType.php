<?php

namespace App\Form;

use App\Entity\Chanteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ChanteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomScene',TextType::class,[
                'attr' => ['class' => 'input--style-4' ],
                'label_attr' => ['class' => 'label' ],
                'label' => 'Nom de Scène'
            ])
            ->add('prenom',TextType::class,[
                'attr' => ['class' => 'input--style-4' ],
                'label_attr' => ['class' => 'label' ]
            ])
            ->add('nom',TextType::class,[
                'attr' => ['class' => 'input--style-4' ],
                'label_attr' => ['class' => 'label' ]
            ])
            ->add('dateNaissance',BirthdayType::class, [
                'format' => 'dd-MM-yyyy',
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
            'data_class' => Chanteur::class,
        ]);
    }
}
