<?php

namespace App\Domain\Repository;

use App\Domain\Entity\ExampleProduct;

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
