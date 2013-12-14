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
            ->add('engine',null, array('label' => 'Moteur'))
            ->add('carburation',null, array('label' => 'Carburant'))
            ->add('consumption',null, array('label' => 'Consommation'))
            ->add('speed',null, array('label' => 'Vitesse'))
            ->add('sleeping',null, array('label' => 'Couchages'))
            ->add('seats',null, array('label' => 'Place'))
            ->add('imgUrl',null, array('label' => 'Photo du combi'))
            ->add('descriptionFr',null, array('label' => 'Description en fr'))
            ->add('descriptionEn',null, array('label' => 'Description en en'))
            ->add('descriptionEs',null, array('label' => 'Description en es'))
            ->add('equipments','entity', array('label' => 'Equipements supplémentaires','class' => 'VintageWest\AdminBundle\Entity\Equipement','multiple' => true))
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
