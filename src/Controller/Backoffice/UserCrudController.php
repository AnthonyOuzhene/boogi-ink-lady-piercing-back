<?php

namespace App\Controller\Backoffice;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name', 'Nom'),
            EmailField::new('email', 'Email'),
            TextField::new('password', 'Mot de passe')->onlyOnForms()->setFormType(PasswordType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrez un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit contenir au moins {{ min }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                    new Regex([
                        'pattern' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/',
                        'message' => 'Votre mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial',
                    ]),
                ],
            ]),

            ChoiceField::new('roles',  'Rôles')
                ->setChoices([
                    'Utilisateur' => 'ROLE_USER',
                    'Administrateur' => 'ROLE_ADMIN',
                ])
                ->setFormTypeOptions([
                    'expanded' => true,
                    'multiple' => true,
                ])
                ->autocomplete()
                ->renderAsBadges()
                ->setHelp('Vous devez choisir au moins un rôle'),
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
                    return $action->setLabel('Détails d\'un utilisateur')->setIcon('fa fa-eye');
                }
            )
            ->update(
                Crud::PAGE_INDEX,
                Action::NEW,
                function (Action $action) {
                    return $action->setLabel('Ajouter un utilisateur')->setIcon('fa fa-plus');
                }
            )
            ->update(
                Crud::PAGE_INDEX,
                Action::EDIT,
                function (Action $action) {
                    return $action->setLabel('Modifier un utilisateur')->setIcon('fa fa-pencil');
                }
            )
            ->update(
                Crud::PAGE_INDEX,
                Action::DELETE,
                function (Action $action) {
                    return $action->setLabel('Supprimer un utilisateur')->setIcon('fa fa-trash');
                }
            );
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // ...
            //->showEntityActionsInlined()
            //->setPaginatorPageSize(10)
            ->setPageTitle(Crud::PAGE_INDEX, 'Liste des utilisateurs')
            ->setPageTitle(Crud::PAGE_NEW, 'Ajouter un utilisateur')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier un utilisateur')
            ->setPageTitle(Crud::PAGE_DETAIL, 'Détails d\'un utilisateur');
    }
}
