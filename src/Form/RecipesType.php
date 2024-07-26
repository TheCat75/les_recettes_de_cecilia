<?php

namespace App\Form;

use App\Entity\Allergens;
use App\Entity\Ingredients;
use App\Entity\NutritionalValues;
use App\Entity\Recipes;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecipesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameRecipe')
            ->add('description')
            ->add('numberOfCovers')
            ->add('preparationTime', null, [
                'widget' => 'single_text',
            ])
            ->add('cookingTime', null, [
                'widget' => 'single_text',
            ])
            // ->add('ingrediens', EntityType::class, [
            //     'class' => Ingredients::class,
            //     'choice_label' => 'name',
            //     'multiple' => true,
            // ])
            // ->add('allergens', EntityType::class, [
            //     'class' => Allergens::class,
            //     'choice_label' => 'name',
            //     'multiple' => true,
            //     'expanded' => true,
            // ])
            // ->add('nutritionalValues', EntityType::class, [
            //     'class' => NutritionalValues::class,
            //     'choice_label' => 'id',
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recipes::class,
        ]);
    }
}