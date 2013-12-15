<?php

namespace VintageWest\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CarType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('model',null, array('label' => 'Modèle du combi'))
            ->add('year',null, array('label' => 'Année de mise circulation'))
            ->add('dimension')
            ->add('engine','text', array('label' => 'Moteur'))
            ->add('carburation','text', array('label' => 'Carburant'))
            ->add('consumption','text', array('label' => 'Consommation'))
            ->add('speed','text', array('label' => 'Vitesse'))
            ->add('sleeping','integer', array('label' => 'Couchages'))
            ->add('seats','integer', array('label' => 'Place'))
            ->add('imgUrl','file', array('label' => 'Photo du combi', 'data_class'=>null))
            ->add('description',null, array('label' => 'Description'))
            ->add('imgIllustration','entity', array('label' => 'Photos supplémentaires du combi','class' => 'VintageWest\AdminBundle\Entity\ImageIllustration','multiple' => true))

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'VintageWest\AdminBundle\Entity\Car'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vintagewest_adminbundle_car';
    }
}
