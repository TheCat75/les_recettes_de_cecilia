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
            ->add('nameRecipe', null, [
                'label' => 'Nom de la recette',
            ])
            ->add('description', null, [
                'label' => 'Description',
            ])
            ->add('numberOfCovers', null, [
                'label' => 'Nombre de couverts',
            ])
            ->add('preparationTime', null, [
                'widget' => 'single_text',
                'label' => 'Temps de préparation',
            ])
            ->add('cookingTime', null, [
                'widget' => 'single_text',
                'label' => 'Temps de cuisson',
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