<?php

namespace App\Controller\Backoffice;

use App\Entity\Post;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use Symfony\Component\Validator\Constraints\Date;

class PostCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Post::class;
    }

    
    // public function configureFields(string $pageName): iterable
    // {
    //     return [
    //         DateTimeField::new('date', 'Date de publication'),

    //     ];
    // }
    
}
