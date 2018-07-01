<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\Package;
use Logme\Soap\Ups\PackagingType;
use Logme\Soap\Ups\Weight;

class PackageTest extends TestCase
{
    /**
     * Package instance.
     * 
     * @var Package
     */
    public $package;

    /**
     * Set up defaults values for all tests.
     */
    public function setUp()
    {
        parent::setUp();
        $this->package = new Package();
    }

    /**
     * @test Sets the defaults attributes values.
     */
    public function it_sets_default_attributes_values()
    {
        $this->assertInstanceOf(PackagingType::class, $this->package->packagingType);
        $this->assertInstanceOf(Weight::class, $this->package->dimWeight);
        $this->assertInstanceOf(Weight::class, $this->package->packageWeight);
    }

    /**
     * @test Sets package type container to package.
     */
    public function it_sets_package_type_container_to_package()
    {
        $this->assertNull($this->package->packagingType->code);
        $this->assertNull($this->package->packagingType->description);

        $packagingType = new PackagingType();
        $packagingType->code = $packagingType::UNKNOWN;

        $this->package->packagingType = $packagingType;

        $this->assertEquals("00", $this->package->packagingType->code);
        $this->assertEquals("UNKNOWN", $this->package->packagingType->description);
    }

    /**
     * @test Sets dimensional package weight container.
     */
    public function it_sets_dimensional_package_weight_container()
    {
        $this->assertNull($this->package->dimWeight->unitOfMeasurement->code);
        $this->assertNull($this->package->dimWeight->unitOfMeasurement->description);
        $this->assertNull($this->package->dimWeight->weight);

        $dimWeight = new Weight();
        $dimWeight->unitOfMeasurement->code = "KGS";
        $dimWeight->weight = "50";

        $this->package->dimWeight = $dimWeight;

        $this->assertEquals("KGS", $this->package->dimWeight->unitOfMeasurement->code);
        $this->assertEquals("Kilograms", $this->package->dimWeight->unitOfMeasurement->description);
        $this->assertEquals("50", $this->package->dimWeight->weight);
    }

    /**
     * @test Sets package weight container.
     */
    public function it_sets_package_weight_container()
    {
        $this->assertNull($this->package->packageWeight->unitOfMeasurement->code);
        $this->assertNull($this->package->packageWeight->unitOfMeasurement->description);
        $this->assertNull($this->package->packageWeight->weight);

        $packageWeight = new Weight();
        $packageWeight->unitOfMeasurement->code = "KGS";
        $packageWeight->weight = "40";

        $this->package->packageWeight = $packageWeight;

        $this->assertEquals("KGS", $this->package->packageWeight->unitOfMeasurement->code);
        $this->assertEquals("Kilograms", $this->package->packageWeight->unitOfMeasurement->description);
        $this->assertEquals("40", $this->package->packageWeight->weight);
    }
}
