<?php

namespace App\Controller\Admin;

use App\Entity\Restaurant;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class RestaurantCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Restaurant::class;
    }



    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('restaurant')
            ->setEntityLabelInSingular('restaurants')

            ->setPageTitle("index", "Modifier les images");
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new('indexPicture')->setUploadDir('public/imgDatabase'),
        ];
    }
}