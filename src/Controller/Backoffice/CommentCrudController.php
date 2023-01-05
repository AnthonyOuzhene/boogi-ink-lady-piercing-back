<?php

namespace App\Controller\Backoffice;

use App\Entity\Comment;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CommentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Comment::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('project_name', 'Nom du projet'),
            AssociationField::new('activity_name', 'Nom de l\'activité')
            ->setFormTypeOption('expanded', true),
            DateField::new('realisation_date', 'Date de réalisation'),
            TextField::new('title', 'Titre du commentaire'),
            TextareaField::new('message', 'Message du commentaire'),
            DateField::new('comment_date', 'Date du commentaire'),
            AssociationField::new('user_id', 'Utilisateur')
            ->setFormTypeOption('expanded', true),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions

            ->add(Crud::PAGE_INDEX, Action::DETAIL)

            ->update(Crud::PAGE_INDEX,
            Action::DETAIL,
            function (Action $action) {
                return $action->setLabel('Détails d\'un commentaire')->setIcon('fa fa-eye');
            })
            ->update(Crud::PAGE_INDEX,
            Action::NEW,
            function (Action $action) {
                return $action->setLabel('Ajouter un commentaire')->setIcon('fa fa-plus');
            })
            ->update(
                Crud::PAGE_INDEX,
                Action::EDIT,
                function (Action $action) {
                    return $action->setLabel('Modifier un commentaire')->setIcon('fa fa-pencil');
                }
            )
            ->update(
                Crud::PAGE_INDEX,
                Action::DELETE,
                function (Action $action) {
                    return $action->setLabel('Supprimer un commentaire')->setIcon('fa fa-trash');
                }
            );
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            //->showEntityActionsInlined()
            ->setPaginatorPageSize(10)
            ->setPageTitle(Crud::PAGE_INDEX, 'Liste des commentaires')
            ->setPageTitle(Crud::PAGE_NEW, 'Ajouter un commentaire')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier un commentaire')
            ->setPageTitle(Crud::PAGE_DETAIL, 'Détails d\'un commentaire');
    }
}
