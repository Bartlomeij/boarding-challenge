<?php

namespace BoardingChallenge\Entities;

use BoardingChallenge\Entities\Location\LocationInterface;
use BoardingChallenge\Entities\Transport\TransportInterface;

/**
 * Class BoardingPass
 * @package BoardingChallenge
 */
class BoardingPass
{
    /**
     * @var LocationInterface
     */
    private $sourceLocation;

    /**
     * @var LocationInterface
     */
    private $destinationLocation;

    /**
     * @var TransportInterface
     */
    private $transport;

    /**
     * @var Baggage|null
     */
    private $baggage;

    /**
     * BoardingPass constructor.
     * @param LocationInterface $sourceLocation
     * @param LocationInterface $destinationLocation
     * @param TransportInterface $transport
     * @param Baggage|null $baggage
     */
    public function __construct(
        LocationInterface $sourceLocation,
        LocationInterface $destinationLocation,
        TransportInterface $transport,
        ?Baggage $baggage = null
    ) {
        $this->sourceLocation = $sourceLocation;
        $this->destinationLocation = $destinationLocation;
        $this->transport = $transport;
        $this->baggage = $baggage;
    }

    /**
     * @return LocationInterface
     */
    public function getSourceLocation(): LocationInterface
    {
        return $this->sourceLocation;
    }

    /**
     * @return LocationInterface
     */
    public function getDestinationLocation(): LocationInterface
    {
        return $this->destinationLocation;
    }

    /**
     * @return TransportInterface
     */
    public function getTransport(): TransportInterface
    {
        return $this->transport;
    }

    /**
     * @return Baggage|null
     */
    public function getBaggage(): ?Baggage
    {
        return $this->baggage;
    }
}