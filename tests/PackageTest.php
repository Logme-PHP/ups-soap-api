<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\Package;
use Logme\Soap\Ups\PackagingType;

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
    }

    /**
     * @test Sets package type container to package.
     */
    public function it_sets_package_type_container_to_package()
    {
        $package = new Package();

        $this->assertNull($this->package->packagingType->code);
        $this->assertNull($this->package->packagingType->description);

        $packagingType = new PackagingType();
        $packagingType->code = $packagingType::UNKNOWN;

        $package->packagingType = $packagingType;

        $this->assertEquals("00", $package->packagingType->code);
        $this->assertEquals("UNKNOWN", $package->packagingType->description);
    }


}
