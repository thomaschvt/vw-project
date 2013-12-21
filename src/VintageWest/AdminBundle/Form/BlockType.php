<?php

namespace VintageWest\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlockType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('type','entity', array('label' => 'Type de bloc','class' => 'VintageWest\AdminBundle\Entity\TypeBlock'))
            ->add('title')
            ->add('content','textarea',array('label'=>'Contenu'))
            ->add('url')
            ->add('icon','file', array('label' => 'Pictogramme du bloc', 'data_class'=>null))
            ->add('page','entity', array('label' => 'Page parente','class' => 'VintageWest\AdminBundle\Entity\Page'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'VintageWest\AdminBundle\Entity\Block'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vintagewest_adminbundle_block';
    }
}
