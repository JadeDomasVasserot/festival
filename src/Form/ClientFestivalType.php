<?php

namespace App\Form;

use App\Entity\ClientFestival;
use App\Entity\Client;
use App\Entity\Festival;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ClientFestivalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idclient',EntityType::class,[
                'class'=> Client::class,
                'label_attr' => ['class' =>'label'],
                'attr' => ['class' => 'asso'],
                'label'=> 'Client'
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
            'data_class' => ClientFestival::class,
        ]);
    }
}
