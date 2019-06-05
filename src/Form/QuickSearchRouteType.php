<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class QuickSearchRouteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('route', RouteType::class, [
                'label' => false
                ])
            ->add('save', SubmitType::class, [
                'label' => 'Ieškoti',
                'attr' => ['class' => 'mdc-button mdc-button--outlined']
            ])
        ;
    }
}
