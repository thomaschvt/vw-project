<?php

namespace VintageWest\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EquipementType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name','text',array('label'=>'Nom de l\'équipement'))
            ->add('description','textarea',array('label'=>'Description'))
            ->add('imgUrl','file',array('label'=>'Visuel de l\'équipement','data_class'=>null))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'VintageWest\AdminBundle\Entity\Equipement'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vintagewest_adminbundle_equipement';
    }
}
