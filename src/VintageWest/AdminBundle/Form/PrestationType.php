<?php

namespace VintageWest\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PrestationType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('isEvent', 'checkbox', array('label' => 'Est-ce que la Prestation doit être présentée sous une forme événementielle ?','required' => false))
            ->add('durationDays')
            ->add('price')
            ->add('description')
            ->add('lang', null, array('label' => 'Langue de la Prestation', 'required' => true))
            ->add('name')
            ->add('imgUrl','file', array('label' => 'Photo de la Prestation', 'data_class'=>null))
            ->add('linkedCombi')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'VintageWest\AdminBundle\Entity\Prestation'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vintagewest_adminbundle_prestation';
    }
}
