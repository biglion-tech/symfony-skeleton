<?php

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\RepositoryInterface\ExampleProductRepositoryInterface;
use App\Domain\Product\ExampleProduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ExampleProduct|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExampleProduct|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExampleProduct[]    findAll()
 * @method ExampleProduct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExampleProductRepository extends ServiceEntityRepository implements ExampleProductRepositoryInterface
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ExampleProduct::class);
    }

    /**
     * @inheritdoc
     */
    public function getProductById(int $id): ?ExampleProduct
    {
        return $this->find($id);
    }
}
