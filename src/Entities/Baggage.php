<?php

namespace BoardingChallenge\Entities;

/**
 * Class Baggage
 * @package BoardingChallenge
 */
class Baggage
{
    /**
     * @var string|null
     */
    private $ticketCounter;

    /**
     * @var bool
     */
    private $isAutomaticallyTransferred;

    /**
     * Baggage constructor.
     * @param string $ticketCounter
     * @param bool $isAutomaticallyTransferred
     */
    public function __construct(?string $ticketCounter, bool $isAutomaticallyTransferred = false)
    {
        $this->ticketCounter = $ticketCounter;
        $this->isAutomaticallyTransferred = $isAutomaticallyTransferred;
    }

    /**
     * @return string|null
     */
    public function getTicketCounter(): ?string
    {
        return $this->ticketCounter;
    }

    /**
     * @return bool
     */
    public function isAutomaticallyTransferred(): bool
    {
        return $this->isAutomaticallyTransferred;
    }
}