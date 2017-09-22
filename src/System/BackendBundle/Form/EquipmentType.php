<?php

namespace System\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EquipmentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('description')
            ->add('ns')
            ->add('ni','text',array(
//                'placeholder' => 'introdusca el numero de inventario'
            ))
            ->add('mark','entity',array(
                'class' => 'System\BackendBundle\Entity\Mark',
                'mapped' => false
            ))
            ->add('model')
            ->add('type')
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'System\BackendBundle\Entity\Equipment'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'system_backendbundle_equipment';
    }


}
