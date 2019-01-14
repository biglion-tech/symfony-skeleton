<?php

namespace App\Application\Product;

use App\Domain\RepositoryInterface\ProductRepositoryInterface;
use App\Domain\Product\Product;

class ProductService
{

    /**
     * @var ProductRepositoryInterface
     */
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function getProductById(int $id): ?array
    {
        $product = $this->productRepository->getProductById($id);

        return ($product instanceof Product) ? $product->toArray() : null;
    }

}
