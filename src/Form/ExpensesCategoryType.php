<?php

namespace App\Form;

use App\Entity\ExpensesCategory;
use App\Entity\Profile;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExpensesCategoryType extends AbstractType
{public function buildForm(FormBuilderInterface $builder, array $options): void
{
    $builder
        // ...
        ->add('categoryNames', CollectionType::class, [
            'entry_type' => CategoryNameType::class, // Utilisez le CategoryNameType ici
            'entry_options' => [
                'label' => false,
                'attr' => ['class' => 'category-name-input'],
            ],
            'allow_add' => true,
            'allow_delete' => true,
            'prototype' => true,
            'by_reference' => false,
        ]);
// ...

}

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExpensesCategory::class,
        ]);
    }
}
