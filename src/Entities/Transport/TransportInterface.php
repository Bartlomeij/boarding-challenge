<?php


namespace BoardingChallenge\Entities\Transport;

/**
 * Interface TransportInterface
 * @package BoardingChallenge
 */
interface TransportInterface
{
    /**
     * @return string
     */
    public function getTransportNumber(): ?string;

    /**
     * @return string|null
     */
    public function getSeatNumber(): ?string;
}