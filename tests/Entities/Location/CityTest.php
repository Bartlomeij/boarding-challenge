<?php

use PHPUnit\Framework\TestCase;
use BoardingChallenge\Entities\Location\City;
use BoardingChallenge\Entities\Location\LocationInterface;

/**
 * Class CityTest
 */
class CityTest extends TestCase
{
    public function testCity(): void
    {
        $cityName = 'Stockholm';
        $city = new City($cityName);
        $this->assertInstanceOf(LocationInterface::class, $city);
        $this->assertEquals($cityName, $city->getName());
    }
}