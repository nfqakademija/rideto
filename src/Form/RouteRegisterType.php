<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class RouteRegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Vardas', 'attr' => ['class' => 'mdc-text-field__input']])
            ->add('age', NumberType::class, ['label' => 'Amžius', 'attr' => ['class' => 'mdc-text-field__input']] )
            ->add('role', ChoiceType::class, [
               'choices' => [
                   'Vairuotojas' => 'driver',
                   'Keleivis' => 'client',
               ],
                'attr' => ['class' => 'mdc-select__native-control'],
                //'label' => 'Profilio tipas'
            ])
            ->add('route_description', TextareaType::class, [
                'attr' => ['class' => 'mdc-text-field__input']
            ])
            ->add('origin_input', TextType::class, [
                'attr' => ['class' => 'mdc-text-field__input']
            ])
            ->add('destination_input', TextType::class, [
                'attr' => ['class' => 'mdc-text-field__input']
            ])
            ->add('home_location', HiddenType::class)
            ->add('work_location', HiddenType::class)
//            ->add('description', TextareaType::class, [
//                'attr' => ['class' => 'mdc-text-field__input']
//            ])
            ->add('save', SubmitType::class, [
                'label' => 'Saugoti',
                'attr' => ['class' => 'mdc-button mdc-button--outlined']
                ])
        ;
    }
}
