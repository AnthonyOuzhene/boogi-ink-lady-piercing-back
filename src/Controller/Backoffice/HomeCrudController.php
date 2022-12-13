<?php

namespace App\Controller\Backoffice;

use App\Entity\Home;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
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
            IdField::new('id')->hideOnForm(),
            TextField::new('name', 'Nom du salon'),
            TextField::new('address', 'Adresse'),
            IntegerField::new('zip_code', 'Code postal'),
            TextField::new('city', 'Ville'),
            //TextField::new('home_img', 'Photo du salon'),
            ImageField::new('home_img', 'Photo du salon')->onlyOnIndex(),
            TextField::new('phone_number', 'Téléphone'),
            BooleanField::new('status', 'Statut'),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions

            ->add(Crud::PAGE_INDEX, Action::DETAIL)

            ->update(
                Crud::PAGE_INDEX,
                Action::DETAIL,
                function (Action $action) {
                    return $action->setLabel('Détails d\'une %entity_label_singular%')->setIcon('fa fa-eye');
                }
            )
            ->update(
                Crud::PAGE_INDEX,
                Action::NEW,
                function (Action $action) {
                    return $action->setLabel('Ajouter une %entity_label_singular%')->setIcon('fa fa-home');
                }
            )
            ->update(
                Crud::PAGE_INDEX,
                Action::EDIT,
                function (Action $action) {
                    return $action->setLabel('Modifier une %entity_label_singular%')->setIcon('fa fa-pencil');
                }
            )
            ->update(
                Crud::PAGE_INDEX,
                Action::DELETE,
                function (Action $action) {
                    return $action->setLabel('Supprimer une %entity_label_singular%')->setIcon('fa fa-trash');
                }
            );
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // ...
            //->showEntityActionsInlined()
            ->setPaginatorPageSize(10)
            ->setPageTitle(Crud::PAGE_INDEX, 'Le Salon de tatouage')
            ->setPageTitle(Crud::PAGE_NEW, 'Ajouter un salon')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier un salon')
            ->setPageTitle(Crud::PAGE_DETAIL, 'Détails du salon');
    }
}

//* pour uploader les images
// ->setBasePath('uploads')
// ->setUploadDir('public/uploads')
// ->setUploadedFileNamePattern('[randomhash].[extension]')
// ->setRequired(false),