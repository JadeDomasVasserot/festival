<?php

namespace App\Form;

use App\Entity\Festival;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
class FestivalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nomfestival',TextType::class,[
            'attr' => ['class' => 'input--style-4' ],
            'label_attr' => ['class' => 'label' ],
            'label' => 'Nom du festival'
        ])
        ->add('datedebut',DateTimeType::class,[
            'attr' => ['class' => 'input--style-4' ],
            'label_attr' => ['class' => 'label' ],
            'label' => 'Date et heure'
        ])
        ->add('lieu',TextType::class,[
            'attr' => ['class' => 'input--style-4' ],
            'label_attr' => ['class' => 'label' ]
        ])
        ->add('genre',TextType::class,[
            'attr' => ['class' => 'input--style-4' ],
            'label_attr' => ['class' => 'label' ]
        ])
        ->add('nbplaces',IntegerType::class,[
            'attr' => ['class' => 'input--style-4' , 'min' => 0],
            'label_attr' => ['class' => 'label' ],
            'label' => 'Nombre de places'
        ])
    ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Festival::class,
        ]);
    }
}
