<?php

namespace App\Controller\Backoffice;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions

            ->add(Crud::PAGE_INDEX, Action::DETAIL)

            ->update(Crud::PAGE_INDEX,
            Action::DETAIL,
            function (Action $action) {
                return $action->setLabel('Détails d\'une %entity_label_singular%')->setIcon('fa fa-eye');
            })
            ->update(Crud::PAGE_INDEX,
            Action::NEW,
            function (Action $action) {
                return $action->setLabel('Ajouter une %entity_label_singular%')->setIcon('fa fa-plus');
            })
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

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
