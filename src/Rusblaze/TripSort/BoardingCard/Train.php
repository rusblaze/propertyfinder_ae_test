<?php
namespace Rusblaze\TripSort\BoardingCard;

class Train extends AbstractCard
{
    /**
     * @var string
     */
    private $trainNumber;
    /**
     * @var string|null
     */
    private $seat;

    /**
     * Train constructor.
     *
     * @param string      $departure
     * @param string      $arrival
     * @param string      $trainNumber
     * @param null|string $seat
     */
    public function __construct(string $departure, string $arrival, string $trainNumber, ?string $seat)
    {
        parent::__construct($departure, $arrival);
        $this->trainNumber = $trainNumber;
        $this->seat        = $seat;
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
        return $this->getTrainNumber();
    }

    /**
     * @return string
     */
    public function getTrainNumber(): string
    {
        return $this->trainNumber;
    }
}