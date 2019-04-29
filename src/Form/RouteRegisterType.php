<?php

namespace App\Form;

use App\Entity\Route;
use App\Entity\WorkShift;
use FOS\UserBundle\Form\Type\RegistrationFormType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RouteRegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'origin-input',
                TextType::class, [
                'attr' => ['class' => 'some-Css-Class'],
                'mapped' => false
            ])
            ->add('destination-input',
                TextType::class, [
                'attr' => ['class' => 'some-Css-Class'],
                'mapped' => false
            ])
            ->add('home_location',HiddenType::class )
            ->add('work_location',HiddenType::class)
            ->add('work_shift',EntityType::class, [
                'class' => WorkShift::class,
                'choice_label' => 'name',
            ])
            ->add('save', SubmitType::class, ['label' => 'Saugoti'])
        ;
    }

    public function getParent()
    {
        return RegistrationFormType::class;
    }

}