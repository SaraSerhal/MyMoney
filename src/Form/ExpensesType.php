<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExpensesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categoryDailyBudget', NumberType::class, [
                'label' => 'Nouveau budget par catégorie:',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Entrez le nouveau budget par catégorie'],
            ])
            ->add('dailyBudget', MoneyType::class, [
                'currency' => 'EUR', // Modifier si nécessaire
                'label' => 'Budget quotidien'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configurez les options du formulaire ici, si nécessaire
        ]);
    }
}
