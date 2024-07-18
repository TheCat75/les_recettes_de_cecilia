<?php

namespace App\Form;

use App\Entity\Allergens;
use App\Entity\Ingredients;
use App\Entity\NutritionalValue;
use App\Entity\Recipes;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecipesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Ingredients', EntityType::class, [
                'class' => Ingredients::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
            ->add('allergens', EntityType::class, [
                'class' => Allergens::class,
                'choice_label' => 'name',
                'multiple' => true,
            ])
            ->add('NutritionalValue', EntityType::class, [
                'class' => NutritionalValue::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recipes::class,
        ]);
    }
}