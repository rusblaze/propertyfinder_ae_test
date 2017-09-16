<?php
namespace Rusblaze\TripSort\BoardingCard;

class Flight extends AbstractCard
{
    /**
     * @var string
     */
    private $flightNumber;
    /**
     * @var string|null
     */
    private $seat;
    /**
     * @var string|null
     */
    private $gate;
    /**
     * @var string|null
     */
    private $ticketCounter;

    /**
     * Flight constructor.
     *
     * @param string $departure
     * @param string $arrival
     * @param string $flightNumber
     * @param string $seat
     * @param string $gate
     * @param string $ticketCounter
     */
    public function __construct(
        string $departure,
        string $arrival,
        string $flightNumber,
        string $seat,
        string $gate,
        string $ticketCounter
    ) {
        parent::__construct($departure, $arrival);
        $this->flightNumber  = $flightNumber;
        $this->seat          = $seat;
        $this->gate          = $gate;
        $this->ticketCounter = $ticketCounter;
    }

    /**
     * @return null|string
     */
    public function getGate()
    {
        return $this->gate;
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
        return $this->getFlightNumber();
    }

    /**
     * @return string
     */
    public function getFlightNumber(): string
    {
        return $this->flightNumber;
    }

    /**
     * @return null|string
     */
    public function getTicketCounter()
    {
        return $this->ticketCounter;
    }
}