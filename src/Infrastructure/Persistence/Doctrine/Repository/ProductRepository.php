<?php

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\RepositoryInterface\ProductRepositoryInterface;
use App\Domain\Product\TestProduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TestProduct|null find($id, $lockMode = null, $lockVersion = null)
 * @method TestProduct|null findOneBy(array $criteria, array $orderBy = null)
 * @method TestProduct[]    findAll()
 * @method TestProduct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository implements ProductRepositoryInterface
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TestProduct::class);
    }

    /**
     * @inheritdoc
     */
    public function getProductById(int $id): ?TestProduct
    {
        return $this->find($id);
    }
}
