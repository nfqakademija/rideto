<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MatchFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('home_distance', ChoiceType::class, [
                'choices' => [
                    'iki 100km' => '100000',
                    'iki 10km' => '10000',
                    'iki 3km' => '3000',
                    'iki 2km' => '2000',
                    'iki 1km' => '1000',
                ],
                'attr' => ['class' => 'mdc-select__native-control'],
            ])
            ->add('work_distance', ChoiceType::class, [
                'choices' => [
                    'iki 100km' => '100000',
                    'iki 10km' => '10000',
                    'iki 3km' => '3000',
                    'iki 2km' => '2000',
                    'iki 1km' => '1000',
                ],
                'attr' => ['class' => 'mdc-select__native-control'],
            ])
            ->add('filter', SubmitType::class, [
                'label' => 'Filtruoti',
                'attr' => ['class' => 'mdc-button mdc-button--outlined']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
