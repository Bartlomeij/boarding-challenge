<?php

namespace BoardingChallenge\Entities\Location;

/**
 * Class City
 * @package BoardingChallenge
 */
class City implements LocationInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * City constructor.
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