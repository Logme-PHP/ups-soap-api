<?php

namespace Logme\Soap\Ups;

use PHPUnit\Framework\TestCase;

class ServiceTest extends TestCase
{
    /**
     * @test Sets service code with a expected value.
     */
    public function it_sets_service_code_with_a_expected_value()
    {
        $service = new Service();
        $service->code = $service::NEXT_DAY_AIR;

        $this->assertEquals('01', $service->code);
        $this->assertEquals('Next Day Air', $service->description);
    }

    /**
     * @test Sets service code with an unexpected value.
     */
    public function it_tries_to_set_service_code_with_an_unexpected_value()
    {
        $service = new Service();
        $service->code = '15461';

        $this->assertEquals('15461', $service->code);
        $this->assertEquals('Unknown code', $service->description);
    }
}
