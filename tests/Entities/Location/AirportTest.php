<?php

use PHPUnit\Framework\TestCase;
use BoardingChallenge\Entities\Location\Airport;
use BoardingChallenge\Entities\Location\LocationInterface;

/**
 * Class AirportTest
 */
class AirportTest extends TestCase
{
    public function testAirport(): void
    {
        $airportName = 'New York JFK';
        $airport = new Airport($airportName);
        $this->assertInstanceOf(LocationInterface::class, $airport);
        $this->assertEquals($airportName, $airport->getName());
    }
}