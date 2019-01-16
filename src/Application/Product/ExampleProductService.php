<?php

namespace App\Application\Product;

use App\Domain\RepositoryInterface\ExampleProductRepositoryInterface;
use App\Domain\Product\ExampleProduct;

/**
 * Class ExampleProductService
 * @package App\Application\Product
 */
class ExampleProductService
{

    /**
     * @var ExampleProductRepositoryInterface
     */
    protected $productRepository;

    public function __construct(ExampleProductRepositoryInterface $productRepository)
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

        return ($product instanceof ExampleProduct) ? $product->toArray() : null;
    }

}
