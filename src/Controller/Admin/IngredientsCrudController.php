<?php

namespace App\Controller\Admin;

use App\Entity\Ingredients;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

class IngredientsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ingredients::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('nameIngredient', "Ingredient");
        yield NumberField::new('quantities', 'Quantité');
        yield ChoiceField::new('units', 'Uniter')->setChoices([
            'g' => 'g',
            'kg' => 'kg',
            'ml' => 'ml',
            'cl' => 'cl',
            'l' => 'l',
            'cuillère à soupe' => 'cuillère à soupe',
            'cuillère à café' => 'cuillère à café',
            'pincée' => 'pincée',
            'feuille' => 'feuille',
            'branche' => 'branche',
            'gousse' => 'gousse',
            'bouquet' => 'bouquet',
            'tranche' => 'tranche',
            'verre' => 'verre',
            'bol' => 'bol',
            'pot' => 'pot',
            'barquette' => 'barquette',
            'boîte' => 'boîte',
            'sachet' => 'sachet',
            'paquet' => 'paquet',
            'brique' => 'brique',
            'pot' => 'pot',
            'bocal' => 'bocal',
            'filet' => 'filet',
            'plaque' => 'plaque',
            'rouleau' => 'rouleau',
            'pièce' => 'pièce',
            
        ]);
    }
    
    
}