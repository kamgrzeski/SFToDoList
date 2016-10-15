<?php

namespace KamilG\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;

class TodoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                'label'  => 'Name',
                'attr'   =>  array(
                    'class'   => 'form-control')))

            ->add('description', 'textarea', array(
                'label'  => 'Description',
                'attr'   =>  array(
                    'class'   => 'form-control' )))

            ->add('created_by', 'date', [
                'data' => new \DateTime(),
                'required' => false,
                'widget' => 'single_text',
                'label' => 'Select Date',
                'attr' => array('class' => 'datetime', "data-date-format" => "yy-mm-dd")
            ]);



    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KamilG\SiteBundle\Entity\Todo'
        ));
    }
}
