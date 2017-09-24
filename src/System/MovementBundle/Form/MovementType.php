<?php

namespace System\MovementBundle\Form;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class MovementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date',DateType::class)
            ->add('instalation',EntityType::class,array(
                'class' => 'System\MovementBundle\Entity\Instalation',
                'mapped' => false
            ))
//            ->add('user')
//            ->add('instalation')
//            ->add('equipments','entity',array(
//                'class' => 'System\BackendBundle\Entity\Equipment',
//                'attr' => array(
//                    'class' => 'selectpicker',
//                    'multiple' => true
//                )
//            ))
//            ->add('person')
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'System\MovementBundle\Entity\Movement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'system_movementbundle_movement';
    }
}
