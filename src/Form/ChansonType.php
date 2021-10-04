<?php

namespace App\Form;

use App\Entity\Chanson;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChansonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomChanson')
            ->add('nomAlbum')
            ->add('duree')
            ->add('genre')
            ->add('idChanteur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Chanson::class,
        ]);
    }
}
