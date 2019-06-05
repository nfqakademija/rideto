<?php

namespace App\Form;

use App\Entity\Route;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RouteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('origin_input', TextType::class, [
                'attr' => ['class' => 'mdc-text-field__input'], 'mapped' => false
            ])
            ->add('destination_input', TextType::class, [
                'attr' => ['class' => 'mdc-text-field__input'], 'mapped' => false
            ])
            ->add('home_location', HiddenType::class)
            ->add('work_location', HiddenType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Route::class
        ]);
    }
}
