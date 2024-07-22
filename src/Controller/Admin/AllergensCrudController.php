<?php

namespace App\Controller\Admin;

use App\Entity\Allergens;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class AllergensCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Allergens::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield AssociationField::new('recipes');
        yield BooleanField::new('cerealsContainingGluten')->hideValueWhenFalse();
        yield BooleanField::new('crustaceans')->hideValueWhenFalse();
        yield BooleanField::new('eggs')->hideValueWhenFalse();
        yield BooleanField::new('fish')->hideValueWhenFalse();
        yield BooleanField::new('milk')->hideValueWhenFalse();
        yield BooleanField::new('nuts')->hideValueWhenFalse();
        yield BooleanField::new('celery')->hideValueWhenFalse();
        yield BooleanField::new('mustard')->hideValueWhenFalse();
        yield BooleanField::new('soybeans')->hideValueWhenFalse();
        yield BooleanField::new('peanuts')->hideValueWhenFalse();
        yield BooleanField::new('sesameSeeds')->hideValueWhenFalse();
        yield BooleanField::new('sulphurDioxideAndSulphites')->hideValueWhenFalse();
        // yield BooleanField::new('lupin')->hideValueWhenFalse();
        // yield BooleanField::new('molluscs')->hideValueWhenFalse();
    }
    
}