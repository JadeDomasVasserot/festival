<?php

namespace App\Form;

use App\Entity\Chanteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChanteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomScene')
            ->add('prenom')
            ->add('nom')
            ->add('dateNaissance')
            ->add('sexe')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Chanteur::class,
        ]);
    }
}
