<?php

namespace App\Controller\Admin;

use App\Entity\Recipes;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;

class RecipesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Recipes::class;
    }


    public function configureFields(string $pageName): iterable
    {

        yield TextField::new('nameRecipe');
        yield TextField::new('description');
        yield IntegerField::new('numberOfCovers');
        yield AssociationField::new('user');
        yield TimeField::new('preparationTime')->setFormat('HH:mm:ss');
        yield TimeField::new('cookingTime')->setFormat('HH:mm:ss');
        yield CollectionField::new('steps')->useEntryCrudForm();
        yield CollectionField::new('ingrediens')->useEntryCrudForm();
        yield CollectionField::new('allergens')->useEntryCrudForm();
        yield CollectionField::new('nutritionalValues')->useEntryCrudForm();
    }
}