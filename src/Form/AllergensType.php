<?php

namespace App\Form;

use App\Entity\Allergens;
use App\Entity\Recipes;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AllergensType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('cerealsContainingGluten')
            ->add('crustaceans')
            ->add('eggs')
            ->add('fish')
            ->add('milk')
            ->add('soybeans')
            ->add('peanuts')
            ->add('nuts')
            ->add('celery')
            ->add('mustard')
            ->add('sesameSeeds')
            ->add('sulphurDioxideAndSulphites')
            ->add('createdAt', null, [
                'widget' => 'single_text',
            ])
            ->add('updatedAt', null, [
                'widget' => 'single_text',
            ])
            ->add('recipes', EntityType::class, [
                'class' => Recipes::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Allergens::class,
        ]);
    }
}
