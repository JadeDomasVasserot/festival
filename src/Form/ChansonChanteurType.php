<?php

namespace App\Form;
use App\Entity\Chanson;
use App\Entity\Chanteur;
use App\Entity\ChansonChanteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ChansonChanteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('idchanson',EntityType::class,[
            'class'=> Chanson::class,
            'label_attr' => ['class' =>'label'],
            'attr' => ['class' => 'asso'],
            'label'=> 'Chanson'
        ])
        ->add('idchanteur',EntityType::class,[
            'class'=> Chanteur::class,
            'label_attr' => ['class' =>'label'],
            'attr' => ['class' => 'asso'],
            'label'=> 'Chanteur'
        ])
    ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ChansonChanteur::class,
        ]);
    }
}
