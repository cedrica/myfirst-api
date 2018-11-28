<?php

namespace App\Controller\Rest;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use App\Entity\Product;
use Symfony\Component\HttpFoundation\Request;
use App\Controller\Rest\ProductService;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends FOSRestController
{
	/**
     * @var ProductService
     */
    private $productService;
    /**
     * ProductController constructor.
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    /**
     * Creates an Product resource
     * @Rest\Post("/products")
     */
    public function postProduct(Request $request): View
    {
    	$entityManager = $this->getDoctrine()->getManager();
    	$product = $this->productService->addProduct($entityManager,$request->get('title'), $request->get('content'));
        // Todo: 400 response - Invalid Input
        // Todo: 404 response - Resource not found
        // In case our POST was a success we need to return a 201 HTTP CREATED response with the created object
        return View::create($product, Response::HTTP_CREATED);
    }
    /**
     * Retrieves an Product resource
     * @Rest\Get("/products/{productId}")
     */
    public function getProduct(int $productId): View
    {
        $product = $this->productService->getProduct($productId);
        // Todo: 404 response - Resource not found
        // In case our GET was a success we need to return a 200 HTTP OK response with the request object
        return View::create($product, Response::HTTP_OK);
    }
    /**
     * Retrieves a collection of Product resource
     * @Rest\Get("/products")
     */
    public function getProducts()
    {
    	
    	$products = $this->productService->getAllProducts();
    	// In case our GET was a success we need to return a 200 HTTP OK response with the collection of product object
    	return View::create($products, Response::HTTP_OK);
    	
        
    }
    /**
     * Replaces Product resource
     * @Rest\Put("/products/{productId}")
     */
    public function putProduct(int $productId, Request $request): View
    {
        $product = $this->productService->updateProduct($productId, $request->get('title'), $request->get('content'));
        // Todo: 400 response - Invalid Input
        // Todo: 404 response - Resource not found
        // In case our PUT was a success we need to return a 200 HTTP OK response with the object as a result of PUT
        return View::create($product, Response::HTTP_OK);
    }
    /**
     * Removes the Product resource
     * @Rest\Delete("/products/{productId}")
     */
    public function deleteProduct(int $productId): View
    {
        $this->productService->deleteProduct($productId);
        // Todo: 404 response - Resource not found
        // In case our DELETE was a success we need to return a 204 HTTP NO CONTENT response. The object is deleted.
        return View::create([], Response::HTTP_NO_CONTENT);
    }
}