<?php

namespace App\Controller\Admin;

use App\Entity\Carte;
use Doctrine\DBAL\Types\FloatType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CarteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Carte::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Carte')
            ->setEntityLabelInSingular('Cartes')

            ->setPageTitle("index", "Afficher la carte")
            ->setPageTitle("new", "Modifier la carte");
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            TextField::new('title', 'Titre'),
            TextField::new('description', 'Description'),
            MoneyField::new('price', 'Prix')->setCurrency('EUR'),
            ChoiceField::new('category', 'Catégorie (Entrées, Plats, Dessert)')->SetChoices([
                'Entrées' => 'Entrées',
                'Plats' => 'Plats',
                'Dessert' => 'Dessert',
            ]),
        ];
    }
}
