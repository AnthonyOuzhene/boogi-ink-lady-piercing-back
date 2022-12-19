<?php

namespace App\Controller\Backoffice;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Validator\Constraints\Length;
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
            // Options pour le champ email : désactiver le champ email lors de la modification
            //EmailField::new('email')->onlyWhenUpdating()->setDisabled(),
            //EmailField::new('email')->onlyWhenCreating(),

            Field::new('password', 'Nouveau mot de passe')->onlyWhenCreating()->setRequired(true)
                ->setFormType(RepeatedType::class)
                ->setFormTypeOptions([
                    'type' => PasswordType::class,
                    'first_options' => ['label' => 'Mot de passe'],
                    'second_options' => ['label' => 'Confirmation du mot de passe'],
                    'error_bubbling' => true,
                    'invalid_message' => 'Les mots de passe ne correspondent pas',

                    'constraints' => [
                        new Length([
                            'min' => 6,
                            'minMessage' => 'Votre mot de passe doit contenir au moins {{ limit }} caractères',
                            // max length allowed by Symfony for security reasons
                            'max' => 4096,
                        ]),
                        new Regex([
                            'pattern' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
                            'message' => 'Votre mot de passe doit contenir au moins une majuscule, une minuscule et un chiffre',
                        ]),
                    ],
                ]),

            Field::new('password', 'Nouveau mot de passe')->onlyWhenUpdating()->setRequired(false)
                ->setFormType(RepeatedType::class)
                ->setFormTypeOptions([
                    'type' => PasswordType::class,
                    'first_options' => ['label' => 'Mot de passe'],
                    'second_options' => ['label' => 'Confirmation du mot de passe'],
                    'error_bubbling' => true,
                    'invalid_message' => 'Les mots de passe ne correspondent pas',

                    'constraints' => [
                        new Length([
                            'min' => 6,
                            'minMessage' => 'Votre mot de passe doit contenir au moins {{ limit }} caractères',
                            // max length allowed by Symfony for security reasons
                            'max' => 4096,
                        ]),
                        new Regex([
                            'pattern' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
                            'message' => 'Votre mot de passe doit contenir au moins une majuscule, une minuscule et un chiffre',
                        ]),
                    ],
                ]),


            ChoiceField::new('roles',   'Rôle')
                ->setFormTypeOptions([
                    'expanded' => true,
                ])
                ->setChoices([
                    'Administrateur' => 'ROLE_ADMIN',
                    'Utilisateur' => 'ROLE_USER',
                ])
                ->allowMultipleChoices(
                    true,
                    'Vous devez choisir au moins un rôle',
                )
                ->renderAsBadges()
                ->setRequired(true)
                ->setHelp('Vous devez choisir au moins un rôle'),

            FormField::addPanel('Changement du mot de passe')->setIcon('fa fa-key')->onlyWhenUpdating(),
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
