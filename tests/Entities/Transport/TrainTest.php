<?php

use PHPUnit\Framework\TestCase;
use BoardingChallenge\Entities\Transport\Train;
use BoardingChallenge\Entities\Transport\TransportInterface;

/**
 * Class TrainTest
 */
class TrainTest extends TestCase
{
    public function testTrain(): void
    {
        $transportNumber = '78A';
        $seatNumber = '45B';

        $train = new Train(
            $transportNumber,
            $seatNumber
        );

        $this->assertInstanceOf(TransportInterface::class, $train);
        $this->assertEquals($transportNumber, $train->getTransportNumber());
        $this->assertEquals($seatNumber, $train->getSeatNumber());
    }
}