<?php

namespace CRA\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProjetmoisType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('nomprojet', EntityType::class, array(
                'class'=>'CRAAdminBundle:Projet',
                'choice_label'=>'nomprojet',
                'placeholder' => 'Sélectionner un Projet'))


            ->add('descp', TextareaType::class, array(
                'attr' => array('class' => 'tinymce')))


            ->add('dated', DateType::class, array(
                'widget' => 'choice',
                'format' => 'dd/MM/yyyy',
            ))
            ->add('datef', DateType::class, array(
                'widget' => 'choice',
                'format' => 'dd/MM/yyyy',
            ))
        ;
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CRA\AdminBundle\Entity\projetmois'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'cra_adminbundle_Projetmois';
    }
}
