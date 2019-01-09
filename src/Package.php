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
     * Package dimensional weight container instance.
     * Values in this container are ignored when package dimensions are provided.
     *
     * @var Weight
     */
    protected $dimWeight;

    /**
     * Package weight container instance.
     * Required for an GFP request.
     *
     * @var Weight
     */
    protected $packageWeight;

    /**
     * Commodity package container instance.
     * Required only for GFP when FRSShipmentIndicator is requested.
     *
     * @var Commodity
     */
    protected $commodity;

    /**
     * Indicates than the shipment will be categorized as a large package.
     *
     * @var bool
     */
    protected $largePackageIndicator = false;

    /**
     * Package service options container instance.
     *
     * @var PackageServiceOptions
     */
    protected $packageServiceOptions;

    /**
     * Create a new Package instance.
     */
    public function __construct()
    {
        $this->packagingType = new PackagingType();
        $this->dimWeight = new Weight();
        $this->packageWeight = new Weight();
        $this->packageServiceOptions = new PackageServiceOptions();
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

    /**
     * Sets the large package indicator for the package.
     *
     * @param bool $value
     * @throws Exception
     */
    public function setLargePackageIndicator($value)
    {
        if (!is_bool($value)) {
            throw new \Exception("The large package indicator value must be a boolean type.");
        }

        $this->largePackageIndicator = true;
    }
}
