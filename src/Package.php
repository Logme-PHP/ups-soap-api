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
     * Dimensions container instance.
     * 
     * @var Dimensions
     */
    protected $dimensions;

    /**
     * Create a new Package instance.
     */
    public function __construct()
    {
        $this->packagingType = new PackagingType;
    }

    /**
     * Sets the packaging type for the package.
     * 
     * @param PackagingType $value
     */ 
    public function setPackagingType(PackagingType $value)
    {
        $this->packagingType = $value;
    }
}
