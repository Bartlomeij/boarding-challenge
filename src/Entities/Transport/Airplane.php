<?php

namespace BoardingChallenge\Entities\Transport;

/**
 * Class Airplane
 * @package BoardingChallenge\Transport
 */
class Airplane implements TransportInterface
{
    /**
     * @var string
     */
    private $transportNumber;

    /**
     * @var string
     */
    private $gateNumber;

    /**
     * @var string
     */
    private $seatNumber;

    /**
     * Airplane constructor.
     * @param string $transportNumber
     * @param string $gateNumber
     * @param string $seatNumber
     */
    public function __construct(string $transportNumber, string $gateNumber, string $seatNumber)
    {
        $this->transportNumber = $transportNumber;
        $this->gateNumber = $gateNumber;
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
    public function getGateNumber(): string
    {
        return $this->gateNumber;
    }

    /**
     * @return string
     */
    public function getSeatNumber(): string
    {
        return $this->seatNumber;
    }
}