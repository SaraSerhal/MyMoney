<?php

namespace App\Form;

use App\Entity\Profile;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AccueilFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('profileType', ChoiceType::class, [
                'choices' => [
                    'Student' => 'Student',
                    'Traveler' => 'Traveler',
                    'Investor' => 'Investor',
                    'Parent' => 'Parent',
                    'Couple' => 'Couple',

                ],
                'attr' => [
                    'class' => 'custom-radio-button',
                ],
            ])

            ->add('profileBudget')


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Profile::class,
        ]);
    }
}
