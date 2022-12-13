<?php

namespace App\Controller\Backoffice;


use App\Entity\Service;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class ServiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Service::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            //hideOnForm() permet de cacher l'ID sur le formulaire d'ajout et de modification
            IdField::new('id')->hideOnForm(),
            TextField::new('name', "Nom du service"),
            IntegerField::new('price', "Prix"),
            TextareaField::new('description', "Description"),
            // hideOnIndex() permet de cacher la photo sur la liste des services
            TextareaField::new('picture', "Photo du service")->hideOnIndex(),
            AssociationField::new('activity_name'),
        ];
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
    
}
