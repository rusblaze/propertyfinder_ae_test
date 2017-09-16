<?php
namespace Rusblaze\TripSort\BoardingCard;

abstract class AbstractCard
{
    /**
     * @var string
     */
    private $departure;
    /**
     * @var string
     */
    private $arrival;

    /**
     * AbstractCard constructor.
     *
     * @param string $departure
     * @param string $arrival
     */
    public function __construct($departure, $arrival)
    {
        $this->departure = $departure;
        $this->arrival   = $arrival;
    }

    /**
     * @return string
     */
    public function getDeparture(): string
    {
        return $this->departure;
    }

    /**
     * @return string
     */
    public function getArrival(): string
    {
        return $this->arrival;
    }

    abstract public function getMeans(): string;
}