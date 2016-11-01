<?php

namespace KamilG\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TodoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'label'  => 'Name',
                'required'    => true,
                'attr'   =>  array(
                    'class'   => 'form-control')))

            ->add('description', TextareaType::class, array(
                'label'  => 'Description',
                'required'    => true,
                'attr'   =>  array(
                    'class'   => 'form-control' )))

            ->add('priority', ChoiceType::class, array(
                'choices' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5'
                ),
                'required'    => true,
                'empty_data'  => null,
                'placeholder' => 'Choose your priority level',
                'attr'   =>  array(
                    'class'   => 'form-control' )

            ))

            ->add('created_by', 'date', [
                'data' => new \DateTime(),
                'widget' => 'single_text',
                'label' => 'Select Date',
                'attr' => array('class' => 'form-control', "data-date-format" => "yy-mm-dd")
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
