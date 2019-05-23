<?php

use PHPUnit\Framework\TestCase;
use BoardingChallenge\Entities\Transport\Airplane;
use BoardingChallenge\Entities\Transport\TransportInterface;

/**
 * Class AirplaneTest
 */
class AirplaneTest extends TestCase
{
    public function testAirplane(): void
    {
        $transportNumber = 'SK455';
        $gateNumber = '45B';
        $seatNumber = '3A';

        $airplane = new Airplane(
            $transportNumber,
            $gateNumber,
            $seatNumber
        );

        $this->assertInstanceOf(TransportInterface::class, $airplane);
        $this->assertEquals($transportNumber, $airplane->getTransportNumber());
        $this->assertEquals($gateNumber, $airplane->getGateNumber());
        $this->assertEquals($seatNumber, $airplane->getSeatNumber());
    }
}