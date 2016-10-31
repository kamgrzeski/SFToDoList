<?php

namespace KamilG\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
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
                'attr'   =>  array(
                    'class'   => 'form-control')))

            ->add('description', TextareaType::class, array(
                'label'  => 'Description',
                'attr'   =>  array(
                    'class'   => 'form-control' )))

            ->add('priority', ChoiceType::class, array(
                'choices' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                    '7' => '7',
                    '8' => '8',
                    '9' => '9',
                    '10' => '10'
                ),
                'required'    => false,
                'placeholder' => 'Choose your priority level',
                'empty_data'  => null,
                'attr'   =>  array(
                    'class'   => 'form-control' )

            ))

            ->add('created_by', 'date', [
                'data' => new \DateTime(),
                'required' => false,
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
