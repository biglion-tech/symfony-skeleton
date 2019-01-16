<?php

namespace App\Domain\Product;

/**
 * Class Product
 * @package App\Domain\Product
 */
class TestProduct
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var integer
     */
    protected $price;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return TestProduct
     */
    public function setName($name): TestProduct
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param integer $price
     * @return TestProduct
     */
    public function setPrice($price): TestProduct
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function toArray() : array {
        return [
            'id' => $this->getId(),
            'name'=> $this->getName(),
            'price' => $this->getPrice(),
        ];
    }

}
