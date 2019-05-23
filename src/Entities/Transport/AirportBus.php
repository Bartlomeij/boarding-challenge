<?php

namespace BoardingChallenge\Entities\Transport;

/**
 * Class AirportBus
 * @package BoardingChallenge\Transport
 */
class AirportBus implements TransportInterface
{
    /**
     * @var string|null
     */
    private $transportNumber;

    /**
     * @var string|null
     */
    private $seatNumber;

    /**
     * AirportBus constructor.
     * @param string|null $transportNumber
     * @param string|null $seatNumber
     */
    public function __construct(?string $transportNumber = null, ?string $seatNumber = null)
    {
        $this->transportNumber = $transportNumber;
        $this->seatNumber = $seatNumber;
    }

    /**
     * @return string
     */
    public function getTransportNumber(): ?string
    {
        return $this->transportNumber;
    }

    /**
     * @return string|null
     */
    public function getSeatNumber(): ?string
    {
        return $this->seatNumber;
    }
}