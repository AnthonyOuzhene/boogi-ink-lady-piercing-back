<?php

namespace App\Controller\Backoffice;

use App\Entity\Post;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class PostCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Post::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title', 'Titre de l\'article'),
            TextField::new('summary', 'Résumé'),
            TextEditorField::new('content'),

            //TextField::new('featured_img', 'Image principale'),
            ImageField::new('featured_img', 'Image mise en avant')->setBasePath('images/')->SetUploadDir('public/images/'),
            DateField::new('created_at', 'Date de publication'),
            AssociationField::new('user_id', 'Utilisateur'),
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
                    return $action->setLabel('Détails d\'un article')->setIcon('fa fa-eye');
                }
            )
            ->update(
                Crud::PAGE_INDEX,
                Action::NEW,
                function (Action $action) {
                    return $action->setLabel('Ajouter un article')->setIcon('fa fa-plus');
                }
            )
            ->update(
                Crud::PAGE_INDEX,
                Action::EDIT,
                function (Action $action) {
                    return $action->setLabel('Modifier un article')->setIcon('fa fa-pencil');
                }
            )
            ->update(
                Crud::PAGE_INDEX,
                Action::DELETE,
                function (Action $action) {
                    return $action->setLabel('Supprimer un article')->setIcon('fa fa-trash');
                }
            );
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // ...
            //->showEntityActionsInlined()
            ->setPaginatorPageSize(7)
            ->setPageTitle(Crud::PAGE_INDEX, 'Liste des  articles')
            ->setPageTitle(Crud::PAGE_NEW, 'Ajouter un article')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier un article')
            ->setPageTitle(Crud::PAGE_DETAIL, 'Détails d\'un article');
    }
}
