<?php

namespace App\Controller\Backoffice;

use App\Entity\Activity;
use App\Entity\Category;
use App\Entity\Comment;
use App\Entity\Gallery;
use App\Entity\Home;
use App\Entity\Post;
use App\Entity\Service;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{
    private $adminUrlGenerator;

    public function __construct(adminUrlGenerator $adminUrlGenerator)
    {
        $this->adminUrlGenerator = $adminUrlGenerator;
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // redirect to some CRUD controller
        $routeBuilder = $this->adminUrlGenerator;
        return $this->redirect($routeBuilder->setController(HomeCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle("Boogi Ink & Lady Piercing");
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Salon de tatouage', 'fa fa-home');
        yield MenuItem::linkToCrud('Activités', 'fa fa-briefcase', Activity::class);
        yield MenuItem::linkToCrud('Categories', 'fa fa-list', Category::class);
        yield MenuItem::linkToCrud('Livre d\'or', 'fa fa-comment', Comment::class);
        yield MenuItem::linkToCrud('Gallerie', 'fa fa-image', Gallery::class);
        yield MenuItem::linkToCrud('Blog', 'fa fa-blog', Post::class);
        yield MenuItem::linkToCrud('Prestations', 'fa fa-pen', Service::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fa fa-users', User::class);
    
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
    public function configureCrud(): Crud
    {
        return Crud::new()
            ->setDateFormat('dd/MM/yyyy');
    }

    
}
