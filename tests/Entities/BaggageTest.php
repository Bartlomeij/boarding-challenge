<?php

use PHPUnit\Framework\TestCase;
use BoardingChallenge\Entities\Baggage;

/**
 * Class BaggageTest
 */
class BaggageTest extends TestCase
{
    public function testBaggage(): void
    {
        $ticketCounter = '344';
        $baggage = new Baggage($ticketCounter);
        $this->assertEquals($ticketCounter, $baggage->getTicketCounter());
        $this->assertFalse($baggage->isAutomaticallyTransferred());
    }

    public function testBaggageTransferredAutomatically(): void
    {
        $baggage = new Baggage(null, true);
        $this->assertNull($baggage->getTicketCounter());
        $this->assertTrue($baggage->isAutomaticallyTransferred());
    }
}