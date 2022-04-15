<?php

namespace App\Form;
use App\Entity\Festival;
use App\Entity\Chanteur;
use App\Entity\ChanteurFestival;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ChanteurFestivalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('idchanteur',EntityType::class,[
            'class'=> Chanteur::class,
            'label_attr' => ['class' =>'label'],
            'attr' => ['class' => 'asso'],
            'label'=> 'Chanteur'
        ])
        ->add('idfestival',EntityType::class,[
            'class'=> Festival::class,
            'label_attr' => ['class' =>'label'],
            'attr' => ['class' => 'asso'],
            'label'=> 'Festival'
        ])
    ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ChanteurFestival::class,
        ]);
    }
}
