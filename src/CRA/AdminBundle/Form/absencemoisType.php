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
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class absencemoisType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder




            ->add('Typeabsence', ChoiceType::class, array('required' => false,
                'choices'  => array(
                    //  ' ' => null,
                    'CP' => 'CP',
                    'RTT' => 'RTT',
                    'CS' => 'CS',
                    'MA' => 'MA',
                    'RS' => 'RS',
                    'EF' => 'EF',
                ),
                'placeholder' => 'Sélectionner votre type d\'absence',
            ))


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
            'data_class' => 'CRA\AdminBundle\Entity\absencemois'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'cra_adminbundle_absencemois';
    }
}
