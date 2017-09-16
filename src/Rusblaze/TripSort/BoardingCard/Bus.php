<?php
namespace Rusblaze\TripSort\BoardingCard;

class Bus extends AbstractCard
{
    /**
     * @var string
     */
    private $busNumber;
    /**
     * @var string|null
     */
    private $seat;

    /**
     * Bus constructor.
     *
     * @param string      $departure
     * @param string      $arrival
     * @param string      $busNumber
     * @param null|string $seat
     */
    public function __construct(string $departure, string $arrival, string $busNumber, ?string $seat)
    {
        parent::__construct($departure, $arrival);
        $this->busNumber = $busNumber;
        $this->seat      = $seat;
    }

    /**
     * @return null|string
     */
    public function getSeat()
    {
        return $this->seat;
    }

    public function getMeans(): string
    {
        return $this->getBusNumber();
    }

    /**
     * @return string
     */
    public function getBusNumber(): string
    {
        return $this->busNumber;
    }
}