<?php

namespace Mediapark\AdvertisementBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;


class AdvertisementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array('label' => false, 'attr' => array('class' => 'form-control form-title', 'placeholder' => 'Title')))
            ->add('description', TextareaType::class, array('label' => false, 'attr' => array('class' => 'form-control form-description', 'placeholder' => 'Description')))
            ->add('save', SubmitType::class, array('label' => 'Post Advertisement', 'attr' => array('class' => 'btn btn-lg btn-primary btn-block form-button')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Mediapark\AdvertisementBundle\Entity\Advertisement',
        ));
    }
}
