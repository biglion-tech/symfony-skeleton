<?php

namespace App\DataFixtures;

use App\Domain\Product\TestProduct;
use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TestFixtures extends Fixture
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager) : void
    {
        for ($i = 0; $i < 20; $i++) {
            $product = new TestProduct();
            $product->setName('product ' . $i);
            $product->setPrice($i);
            $manager->persist($product);
        }

        $manager->flush();
    }
}
