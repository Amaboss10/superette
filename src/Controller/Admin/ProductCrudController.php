<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return[
            IdField::new('id')->hideOnForm(),
            TextField::new('title')->setLabel('Titre'),
            NumberField::new('price')->setLabel('Prix'),
            TextField::new('description')->setLabel('Description'),
            NumberField::new('quantity')->setLabel('Quantité'),
            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('imageName')
                        ->setBasePath('/images/products')
                        ->setUploadDir('public/images/products'),
        ];
    }
}
