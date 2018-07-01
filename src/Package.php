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
     * Package dimensional weight container.
     * Values in this container are ignored when package dimensions are provided.
     * 
     * @var Weight
     */
    protected $dimWeight;

    /**
     * Package weight container.
     * Required for an GFP request.
     * 
     * @var Weight
     */
    protected $packageWeight;

    /**
     * Create a new Package instance.
     */
    public function __construct()
    {
        $this->packagingType = new PackagingType;
        $this->dimWeight = new Weight();
        $this->packageWeight = new Weight();
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

    /**
     * Sets the dimensional weight for the package.
     * 
     * @param Weight $value
     */
    public function setDimWeight(Weight $value)
    {
        $this->dimWeight = $value;
    }

    /**
     * Sets the package weight for the package.
     * 
     * @param Weight $value
     */
    public function setPackageWeight(Weight $value)
    {
        $this->packageWeight = $value;
    }
}
