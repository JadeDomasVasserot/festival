<?php

namespace App\Form;

use App\Entity\Chanson;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;

class ChansonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nomChanson',TextType::class,[
            'attr' => ['class' => 'input--style-4' ],
            'label_attr' => ['class' => 'label' ],
            'label' => 'Titre de la chanson'
        ])
        ->add('nomAlbum',TextType::class,[
            'attr' => ['class' => 'input--style-4' ],
            'label_attr' => ['class' => 'label' ],
            'label' => "Nom de l'album"
        ])
        ->add('duree',TimeType::class,[
            'label_attr'=> ['class' => 'label'],
            'with_seconds' => true
        ])
        ->add('genre',TextType::class,[
            'attr' => ['class' => 'input--style-4' ],
            'label_attr' => ['class' => 'label' ]
        ])
    ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Chanson::class,
        ]);
    }
}
