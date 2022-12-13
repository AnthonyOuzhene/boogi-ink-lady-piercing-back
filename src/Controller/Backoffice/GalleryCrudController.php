<?php

namespace App\Controller\Backoffice;

use App\Entity\Gallery;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class GalleryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Gallery::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name', 'Titre de l\'image'),
            TextField::new('main_picture', 'Image principale'),
            TextField::new('picture1', 'Image secondaire 1'),
            TextField::new('picture2', 'Image secondaire 2'),
            TextField::new('picture3', 'Image secondaire 3'),
            TextField::new('picture4', 'Image secondaire 4'),
            TextField::new('picture5', 'Image secondaire 5'),
            TextField::new('video', 'Vidéo'),
            DateField::new('realisation_date', 'Date de réalisation '),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions

            ->add(Crud::PAGE_INDEX, Action::DETAIL)

            ->update(Crud::PAGE_INDEX,
            Action::DETAIL,
            function (Action $action) {
                return $action->setLabel('Détails d\'une réalisation photo')->setIcon('fa fa-eye');
            })
            ->update(Crud::PAGE_INDEX,
            Action::NEW,
            function (Action $action) {
                return $action->setLabel('Ajouter une réalisation photo')->setIcon('fa fa-plus');
            })
            ->update(
                Crud::PAGE_INDEX,
                Action::EDIT,
                function (Action $action) {
                    return $action->setLabel('Modifier une réalisation photo')->setIcon('fa fa-pencil');
                }
            )
            ->update(
                Crud::PAGE_INDEX,
                Action::DELETE,
                function (Action $action) {
                    return $action->setLabel('Supprimer une réalisation photo')->setIcon('fa fa-trash');
                }
            );
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // ...
            //->showEntityActionsInlined()
            ->setPaginatorPageSize(10)
            ->setPageTitle(Crud::PAGE_INDEX, 'Liste des photos')
            ->setPageTitle(Crud::PAGE_NEW, 'Ajouter une photo')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier une photo')
            ->setPageTitle(Crud::PAGE_DETAIL, 'Détails d\'une photo');
    }
}
