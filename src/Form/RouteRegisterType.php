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
            ->add('name', TextType::class, ['label' => 'Vardas'])
            ->add('age', NumberType::class, ['label' => 'Amžius'])
            ->add('role', ChoiceType::class, [
               'choices' => [
                   'Vairuotojas' => 'driver',
                   'Keleivis' => 'client',
               ],
                'label' => 'Profilio tipas'
            ])
            ->add('route_description', TextareaType::class)
            ->add('origin-input',TextType::class, [
                'attr' => ['class' => 'some-Css-Class'],
            ])
            ->add('destination-input',TextType::class, [
                'attr' => ['class' => 'some-Css-Class'],
            ])
            ->add('home_location',HiddenType::class )
            ->add('work_location',HiddenType::class)
            ->add('description', TextareaType::class)
            ->add('save', SubmitType::class, ['label' => 'Saugoti'])
        ;
    }

}