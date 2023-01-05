<?php

namespace App\Controller\Backoffice;

use App\Entity\Gallery;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

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
            
            TextField::new('main_pictureFile', 'Image principale')->setFormType(VichImageType::class)->onlyOnForms(),
            ImageField::new('main_picture', 'Image principale')->setBasePath('/uploads/gallery')->onlyOnIndex(),

            textField::new('picture1File', 'Image secondaire 1')->setFormType(VichImageType::class)->onlyOnForms(),
            ImageField::new('picture1', 'Image secondaire 1')->setBasePath('/uploads/gallery')->onlyOnIndex(),

            textField::new('picture2File', 'Image secondaire 2')->setFormType(VichImageType::class)->onlyOnForms(),
            ImageField::new('picture2', 'Image secondaire 2')->setBasePath('/uploads/gallery')->onlyOnIndex(),

            textField::new('picture3File', 'Image secondaire 3')->setFormType(VichImageType::class)->onlyOnForms(),
            ImageField::new('picture3', 'Image secondaire 3')->setBasePath('/uploads/gallery')->onlyOnIndex(),

            textField::new('picture4File', 'Image secondaire 4')->setFormType(VichImageType::class)->onlyOnForms(),
            ImageField::new('picture4', 'Image secondaire 4')->setBasePath('/uploads/gallery')->onlyOnIndex(),

            textField::new('picture5File', 'Image secondaire 5')->setFormType(VichImageType::class)->onlyOnForms(),
            ImageField::new('picture5', 'Image secondaire 5')->setBasePath('/uploads/gallery')->onlyOnIndex(),

            TextField::new('videoFile', 'Vidéo')->setFormType(VichImageType::class)->onlyOnForms(),

            DateField::new('realisation_date', 'Date de réalisation '),

            AssociationField::new('category_name', 'Catégorie')
            ->setFormTypeOptions([
                'expanded' => true,
            ]),
            AssociationField::new('activity_name', 'Activité')
            ->setFormTypeOptions([
                'expanded' => true,
            ]),
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
