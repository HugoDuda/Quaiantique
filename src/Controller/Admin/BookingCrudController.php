<?php

namespace App\Controller\Admin;

use App\Entity\Booking;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class BookingCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Booking::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('réservations')
            ->setEntityLabelInSingular('réservation')

            ->setPageTitle("index", "Afficher les réservations")
            ->setPageTitle("new", "Vous ne pouvez pas ajouter de réservation par le tableau d'administration");
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            TextField::new('Allergy')
                ->hideOnForm(),
            TimeField::new('hours')
                ->hideOnForm(),
            DateField::new('day')
                ->hideOnForm(),
            IntegerField::new('guestNumber')
                ->hideOnForm(),
            EmailField::new('email')
                ->hideOnForm(),
        ];
    }
}
