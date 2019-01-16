<?php

namespace App\Infrastructure\Api\Models\Validation;

/**
 * Class ExampleProductCheckId
 * @package App\Infrastructure\Api\Models\Validation
 */
class ExampleProductCheckId
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
