<?php

namespace App\Controller\Admin;

use App\Entity\NutritionalValues;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class NutritionalValuesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return NutritionalValues::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('energy');
        yield TextField::new('carbohydrates');
        yield TextField::new('proteins');
        yield TextField::new('fats');
        yield TextField::new('salt');
        yield TextField::new('sugars');
        yield TextField::new('lipids');
        yield TextField::new('saturatedFattyAcids');
        yield TextField::new('dietaryFibers');
        
    }
    
}