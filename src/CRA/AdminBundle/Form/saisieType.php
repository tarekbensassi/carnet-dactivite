<?php

namespace CRA\AdminBundle\Form;

use CRA\AdminBundle\Entity\Projet;
use CRA\UserBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\FormTypeInterface;
class saisieType extends AbstractType
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

                    'CP' => 'CP',
                    'RTT' => 'RTT',
                    'CS' => 'CS',
                    'MA' => 'MA',
                    'RS' => 'RS',
                    'EF' => 'EF',
                ),

            ))
            ->add('date', DateType::class, array(
                'widget' => 'choice',
            ))
            ->add('loctravail', ChoiceType::class, array(
                'choices'  => array(


                    'Bureau' => 'Bureau',
                    'Client' => 'Client',

                ),
                'placeholder' => 'Lieu',
            ))
            ->add('heurd')
            ->add('heurf')
            ->add('nomprojet', EntityType::class, array(
                'class'=>'CRAAdminBundle:Projet',
                'choice_label'=>'nomprojet',
                'placeholder' => 'Projet'

            ))

            ->add('natintervention')
            ->add('user',EntityType::class, array(
                'class'=>'UserBundle:User',
                'choice_label'=>'username'))

        ;
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CRA\AdminBundle\Entity\Historique'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'cra_adminbundle_historique';
    }
}
