<?php

namespace App\Tests\Application\ReceiptService;

use App\Application\ReceiptService\ReceiptService;
use App\Application\Product\ProductService;
use App\Domain\Product\TestProduct;
use Doctrine\ORM\EntityManager;

class ProductServiceTest extends \Codeception\Test\Unit
{
    /**
     * @var ProductService
     */
    protected $service;

    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @var TestProduct
     */
    protected $product;

    protected function _before()
    {
        /** @var \Codeception\Module\Symfony $module */
        $module = $this->getModule('Symfony');
        $this->service = $module->kernel->getContainer()->get(ProductService::class);
        $this->entityManager = $module->kernel->getContainer()->get('doctrine.orm.entity_manager');

        $product = new TestProduct();
        $product->setName('test');
        $product->setPrice(10);

        $this->entityManager->persist($product);
        $this->entityManager->flush();

        $this->product = $product;
    }

    protected function _after()
    {
        $this->entityManager->remove($this->product);
        $this->entityManager->flush();
    }

    public function testGetProdcut()
    {
        $product = $this->product;
        $actual = $this->service->getProductById($product->getId());
        $expected = [
            'id' => $product->getId(),
            'name' => $product->getName(),
            'price' => $product->getPrice(),
        ];

        $this->assertEquals($expected, $actual);
    }
}
