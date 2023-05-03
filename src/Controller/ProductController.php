<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function index(EntityManagerInterface $entityManager, int $id): Response
    {
        $product = $entityManager->getRepository(Product::class)->findBy(['id' => $id], []);

        //On met le $product[0] à null, comme ça le twig peut handle l'erreur
        if(!$product[0]) {
            $product = [null];
        }

        return $this->render('product/index.html.twig', [
            'product' => $product[0],
        ]);
    }
}
