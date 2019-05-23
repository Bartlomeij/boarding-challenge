<?php

use PHPUnit\Framework\TestCase;
use BoardingChallenge\Entities\Transport\AirportBus;
use BoardingChallenge\Entities\Transport\TransportInterface;

/**
 * Class AirportBusTest
 */
class AirportBusTest extends TestCase
{
    public function testAirportBusWithNoDetails(): void
    {
        $airportBus = new AirportBus();

        $this->assertInstanceOf(TransportInterface::class, $airportBus);
        $this->assertNull($airportBus->getTransportNumber());
        $this->assertNull($airportBus->getSeatNumber());
    }

    public function testAirportBusWithTransportNumberAndSeatNumber(): void
    {
        $transportNumber = '78A';
        $seatNumber = '45B';
        $airportBus = new AirportBus(
            $transportNumber,
            $seatNumber
        );

        $this->assertInstanceOf(TransportInterface::class, $airportBus);
        $this->assertEquals($transportNumber, $airportBus->getTransportNumber());
        $this->assertEquals($seatNumber, $airportBus->getSeatNumber());
    }
}