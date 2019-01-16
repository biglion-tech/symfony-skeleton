<?php

namespace App\Domain\Entity;

/**
 * Class ExampleProduct
 * @package App\Domain\Entity
 */
class ExampleProduct
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
     * @return ExampleProduct
     */
    public function setName($name): ExampleProduct
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
     * @return ExampleProduct
     */
    public function setPrice($price): ExampleProduct
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
