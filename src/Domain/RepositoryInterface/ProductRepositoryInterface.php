<?php

namespace App\Domain\RepositoryInterface;

use App\Domain\Product\TestProduct;

/**
 * Interface ProductRepositoryInterface
 * @package App\Domain\RepositoryInterface
 */
interface ProductRepositoryInterface
{
    /**
     * @param int $id
     * @return TestProduct|null
     */
    public function getProductById(int $id): ?TestProduct;

}
