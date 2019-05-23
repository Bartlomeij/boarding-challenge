<?php

namespace BoardingChallenge\Entities\Transport;

/**
 * Class Train
 * @package BoardingChallenge\Transport
 */
class Train implements TransportInterface
{
    /**
     * @var string
     */
    private $transportNumber;

    /**
     * @var string
     */
    private $seatNumber;

    /**
     * Train constructor.
     * @param string $transportNumber
     * @param string $seatNumber
     */
    public function __construct(string $transportNumber, string $seatNumber)
    {
        $this->transportNumber = $transportNumber;
        $this->seatNumber = $seatNumber;
    }

    /**
     * @return string
     */
    public function getTransportNumber(): string
    {
        return $this->transportNumber;
    }

    /**
     * @return string
     */
    public function getSeatNumber(): string
    {
        return $this->seatNumber;
    }
}