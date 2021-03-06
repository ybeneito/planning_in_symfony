<?php

namespace App\Controller\Admin;

use App\Entity\Secuser;
use App\Entity\Projects;
use App\Entity\Teams;
use App\Entity\Users;
use App\Entity\Tickets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
// use App\Controller\Admin\TeamsCrudController;

class DashboardController extends AbstractDashboardController
{

    private $adminUrlGenerator;

    public function __construct(AdminUrlGenerator $adminUrlGenerator)
    {
        $this->adminUrlGenerator = $adminUrlGenerator;
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
         // redirect to some CRUD controller
         $routeBuilder = $this->get(AdminUrlGenerator::class);

         return $this->redirect($routeBuilder->setController(UsersCrudController::class)->generateUrl());
 
 
         // you can also render some template to display a proper Dashboard
         // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
         return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Planning_Admin');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Retour au site', 'fas fa-home', 'accueil');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', Users::class);
        yield MenuItem::linkToCrud('Équipes', 'fas fa-users', Teams::class);
        yield MenuItem::linkToCrud('Projets', 'fas fa-briefcase', Projects::class);
        yield MenuItem::linkToCrud('Tickets', 'fa fa-ticket', Tickets::class);
        yield MenuItem::linkToCrud('Secuser', 'fa fa-ticket', Secuser::class);

    }
}
