<?php

namespace App\Controller\Admin;

use App\Entity\Image;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Image::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Image')
            ->setEntityLabelInSingular('Images')
            ->setPageTitle("index", "Afficher et modifier les images");
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new('indexImageFile')->setUploadDir('public/imgUpload'),
            TextField::new('indexImageName')
        ];
    }
}
