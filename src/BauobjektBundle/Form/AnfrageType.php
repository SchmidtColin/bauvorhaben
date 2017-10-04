<?php

namespace BauobjektBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnfrageType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('beschreibung')->add('menge')->add('submit', SubmitType::class, array(
            'label' => 'Speichern',
            'attr' => array(
                'class' => 'waves-effect waves-light btn',
                'style' => 'margin: 20px'
                )
        ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BauobjektBundle\Entity\Anfrage'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'bauobjektbundle_anfrage';
    }


}
