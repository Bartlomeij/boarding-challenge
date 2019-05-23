<?php

use PHPUnit\Framework\TestCase;
use BoardingChallenge\Entities\Baggage;
use BoardingChallenge\Entities\BoardingPass;
use BoardingChallenge\Entities\Location;
use BoardingChallenge\Entities\Transport;

/**
 * Class BoardingPassTest
 */
class BoardingPassTest extends TestCase
{
    public function testBoardingPassWithoutBaggage(): void
    {
        $sourceLocationName = 'Madrid';
        $destinationLocationName = 'Barcelona';
        $transportNumber = '78A';
        $seatNumber = '45B';

        $sourceLocation = new Location\City($sourceLocationName);
        $destinationLocation = new Location\City($destinationLocationName);
        $train = new Transport\Train(
            $transportNumber,
            $seatNumber
        );

        $boardingPass = new BoardingPass(
            $sourceLocation,
            $destinationLocation,
            $train
        );

        $this->assertEquals($sourceLocationName, $boardingPass->getSourceLocation()->getName());
        $this->assertEquals($destinationLocationName, $boardingPass->getDestinationLocation()->getName());
        $this->assertEquals($transportNumber, $boardingPass->getTransport()->getTransportNumber());
        $this->assertEquals($seatNumber, $boardingPass->getTransport()->getSeatNumber());
        $this->assertNull($boardingPass->getBaggage());
        $this->assertInstanceOf(Location\LocationInterface::class, $boardingPass->getSourceLocation());
        $this->assertInstanceOf(Location\LocationInterface::class, $boardingPass->getDestinationLocation());
        $this->assertInstanceOf(Transport\TransportInterface::class, $boardingPass->getTransport());
    }

    public function testBoardingPassWithBaggage(): void
    {
        $sourceLocationName = 'Gerona Airport';
        $destinationLocationName = 'Stockholm';
        $transportNumber = 'SK455';
        $gateNumber = '45B';
        $seatNumber = '3A';
        $baggageTicketCounter = '344';

        $sourceLocation = new Location\Airport($sourceLocationName);
        $destinationLocation = new Location\Airport($destinationLocationName);
        $train = new Transport\Airplane(
            $transportNumber,
            $gateNumber,
            $seatNumber
        );
        $baggage = new Baggage($baggageTicketCounter);

        $boardingPass = new BoardingPass(
            $sourceLocation,
            $destinationLocation,
            $train,
            $baggage
        );

        $this->assertEquals($sourceLocationName, $boardingPass->getSourceLocation()->getName());
        $this->assertEquals($destinationLocationName, $boardingPass->getDestinationLocation()->getName());
        $this->assertEquals($transportNumber, $boardingPass->getTransport()->getTransportNumber());
        $this->assertEquals($seatNumber, $boardingPass->getTransport()->getSeatNumber());
        $this->assertEquals($baggageTicketCounter, $boardingPass->getBaggage()->getTicketCounter());
        $this->assertInstanceOf(Location\LocationInterface::class, $boardingPass->getSourceLocation());
        $this->assertInstanceOf(Location\LocationInterface::class, $boardingPass->getDestinationLocation());
        $this->assertInstanceOf(Transport\TransportInterface::class, $boardingPass->getTransport());
    }
}