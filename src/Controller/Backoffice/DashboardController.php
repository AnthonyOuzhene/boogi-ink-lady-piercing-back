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
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Activity', 'fa fa-home', Activity::class);
        yield MenuItem::linkToCrud('Category', 'fa fa-home', Category::class);
        yield MenuItem::linkToCrud('Comment', 'fa fa-home', Comment::class);
        yield MenuItem::linkToCrud('Gallery', 'fa fa-home', Gallery::class);
        yield MenuItem::linkToCrud('Post', 'fa fa-home', Post::class);
        yield MenuItem::linkToCrud('Service', 'fa fa-home', Service::class);
        yield MenuItem::linkToCrud('User', 'fa fa-home', User::class);

    

        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
