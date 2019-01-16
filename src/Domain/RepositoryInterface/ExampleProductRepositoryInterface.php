<?php

namespace App\Domain\RepositoryInterface;

use App\Domain\Product\ExampleProduct;

/**
 * Interface ExampleProductRepositoryInterface
 * @package App\Domain\RepositoryInterface
 */
interface ExampleProductRepositoryInterface
{
    /**
     * @param int $id
     * @return ExampleProduct|null
     */
    public function getProductById(int $id): ?ExampleProduct;

}
