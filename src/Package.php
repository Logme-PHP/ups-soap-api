<?php

namespace Logme\Soap\Ups;

class Package extends AbstractModel
{
    /**
     * Packaging Type container instance.
     * 
     * @var PackagingType
     */
    protected $packagingType;

    /**
     * Create a new Package instance.
     */
    public function __construct()
    {
        $this->packagingType = new PackagingType;
    }

    /**
     * Sets the packaging type for the package.
     */ 
    public function setPackagingType($value)
    {
        $this->packagingType = $value;
    }
}
