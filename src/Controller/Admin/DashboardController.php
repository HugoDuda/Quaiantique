<?php

namespace App\Controller\Admin;

use App\Entity\Booking;
use App\Entity\Carte;
use App\Entity\Image;
use App\Entity\Time;
use App\Entity\Menu;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    #[IsGranted('ROLE_ADMIN')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Guestbook');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Tableau de bord', 'fa fa-home');

        yield MenuItem::subMenu('Gestion d\'utilisateur', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Afficher les utilisateurs', 'fas fa-eye', User::class)
        ]);

        yield MenuItem::subMenu('Gestion de réservation', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Afficher les réservations', 'fas fa-eye', Booking::class)
        ]);

        yield MenuItem::subMenu('Gestion de la carte', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter un element à la carte', 'fas fa-map', Carte::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher et modifier la carte', 'fas fa-eye', Carte::class)
        ]);

        yield MenuItem::subMenu('Gestion du menu', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter un menu', 'fas fa-map', Menu::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher et modifier le menu', 'fas fa-eye', Menu::class)
        ]);

        yield MenuItem::subMenu('Gestion des horaires', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Afficher et modifier les horaires', 'fas fa-eye', Time::class)
        ]);

        yield MenuItem::subMenu('Gestion des images', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Afficher et modifier les images', 'fas fa-eye', Image::class)
        ]);

        yield MenuItem::linkToRoute('Retourner sur le site', 'fa fa-door-open', 'app_index');
    }
}
