<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\Package;
use Logme\Soap\Ups\PackagingType;

class PackageTest extends TestCase
{
    /**
     * @test Sets package type container to package.
     */
    public function it_sets_package_type_container_to_package()
    {
        $package = new Package();

        $this->assertInstanceOf(PackagingType::class, $package->packagingType);

        $packagingType = new PackagingType();
        $packagingType->code = $packagingType::UNKNOWN;

        $package->packagingType = $packagingType;

        $this->assertEquals("00", $package->packagingType->code);
        $this->assertEquals("UNKNOWN", $package->packagingType->description);
    }
}
