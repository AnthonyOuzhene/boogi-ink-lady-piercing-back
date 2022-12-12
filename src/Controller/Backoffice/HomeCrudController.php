<?php

namespace App\Controller\Backoffice;

use App\Entity\Home;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use phpDocumentor\Reflection\Types\Boolean;

class HomeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Home::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('name', 'Nom du salon'),
            TextField::new('address', 'Adresse'),
            IntegerField::new('zip_code', 'Code postal'),
            TextField::new('city', 'Ville'),
            TextField::new('phone_number', 'Téléphone'),
            BooleanField::new('status', 'Statut'),
        ];
    }
    
}
