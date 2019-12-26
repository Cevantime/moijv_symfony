<?php


namespace App\Controller\Admin;


use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/admin/product/details/{id}", name="product_detail")
     */
    public function details(Product $product)
    {
        return $this->render('admin/product_detail.html.twig', [
            'product' => $product
        ]);
    }
}
