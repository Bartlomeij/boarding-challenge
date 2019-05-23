<?php

namespace BoardingChallenge\Entities\Location;

/**
 * Class Airport
 * @package BoardingChallenge
 */
class Airport implements LocationInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * Airport constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}