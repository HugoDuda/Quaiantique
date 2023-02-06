<?php

namespace App\Controller\Admin;

use App\Entity\Time;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class TimeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Time::class;
    }


    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('horaire')
            ->setEntityLabelInSingular('horaires')

            ->setPageTitle("index", "Afficher et modifier les horaires (ne pas ajouter, mais uniquement modifier l'horaire)");
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TimeField::new('morningOpening', 'Horaire d\'ouverture du matin'),
            TimeField::new('morningClosing', 'Horaire de fermeture du matin'),
            TimeField::new('eveningOpening', 'Horaire d\'ouverture du soir'),
            TimeField::new('eveningClosing', 'Horaire de fermeture du soir'),
        ];
    }
}
