<?php

namespace App\Form;

use App\Entity\Festival;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
class FestivalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomfestival')
            ->add('datedebut',DateTimeType::class)
            ->add('lieu')
            ->add('genre')
            ->add('nbplaces')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Festival::class,
        ]);
    }
}
