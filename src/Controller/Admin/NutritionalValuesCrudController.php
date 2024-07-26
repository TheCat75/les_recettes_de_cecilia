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
        yield TextField::new('energy', 'Energy (kcal)');
        yield TextField::new('carbohydrates', 'Carbohydrates (g)');
        yield TextField::new('proteins', 'Proteins (g)');
        yield TextField::new('fats', 'Fats (g)');
        yield TextField::new('salt', 'Salt (g)');
        yield TextField::new('sugars', 'Sugars (g)');
        yield TextField::new('lipids', 'Lipids (g)');
        yield TextField::new('saturatedFattyAcids', 'Saturated Fatty Acids (g)');
        yield TextField::new('dietaryFibers', 'Dietary Fibers (g)');
        
    }
    
}