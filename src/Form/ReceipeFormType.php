<?php

namespace App\Form;

use App\Entity\Allergens;
use App\Entity\Ingrediens;
use App\Entity\Receipes;
use App\Entity\Steps;
use App\Entity\NutritionalValues;
use Symfony\UX\LiveComponent\Form\Type\LiveCollectionType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReceipeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [
                'empty_data' => '',
            ])
            ->add('allergens', LiveCollectionType::class, [
                'entry_type' => AllergensFormType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ])
            ->add('ingrediens', LiveCollectionType::class, [
                'entry_type' => IngrediensFormType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ])
            ->add('steps', LiveCollectionType::class, [
                'entry_type' => StepFormType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ])
            ->add('nutritionalValues', LiveCollectionType::class, [
                'entry_type' => NutritionalValuesFormType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ])

            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Receipes::class,
        ]);
    }
}