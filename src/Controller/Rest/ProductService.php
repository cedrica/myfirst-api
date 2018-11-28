<?php

namespace App\Controller\Rest;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;

class ProductService 
{
	/**
     * @var ProductRepositoryInterface
     */
    private $productRepository;
    public function __construct(ProductRepository $productRepository){
        $this->productRepository = $productRepository;
    }
    public function getProduct(int $productId): ?Product
    {
        return $this->productRepository->findById($productId)[0];
    }
    public function getAllProducts(): ?array
    {
        return $this->productRepository->findAll();
    }
    public function addProduct($entityManager,string $title, string $content): Product
    {
        $product = new Product();
        $product->setTitle($title);
        $product->setContent($content);
        $this->productRepository->save($entityManager,$product);
        return $product;
    }
    public function updateProduct(int $productId, string $title, string $content): ?Product
    {
        $product = $this->productRepository->findById($productId);
        if (!$product) {
            return null;
        }
        $product->setTitle($title);
        $product->setContent($content);
        $this->productRepository->save($product);
        return $product;
    }
    public function deleteProduct(int $productId): void
    {
        $product = $this->productRepository->findById($productId);
        if ($product) {
            $this->productRepository->delete($product);
        }
    }
    
}