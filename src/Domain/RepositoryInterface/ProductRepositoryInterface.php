<?php

namespace App\Domain\RepositoryInterface;

use App\Domain\Product\Product;

/**
 * Interface ProductRepositoryInterface
 * @package App\Domain\RepositoryInterface
 */
interface ProductRepositoryInterface
{
    /**
     * @param int $id
     * @return Product|null
     */
    public function getProductById(int $id): ?Product;

}
