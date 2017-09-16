<?php
declare(strict_types=1);

namespace Test;

use PHPUnit\Framework\TestCase;
use Rusblaze\TripSort\BoardingCard\AbstractCard;
use Rusblaze\TripSort\BoardingCard\Bus as BusBoardingCard;
use Rusblaze\TripSort\BoardingCard\Flight as FlightBoardingCard;
use Rusblaze\TripSort\BoardingCard\Train as TrainBoardingCard;
use Rusblaze\TripSort\TripSort;
use Rusblaze\TripSort\TripSortService;

/**
 * @covers Email
 */
final class EmailTest extends TestCase
{
    public function testCorrectInit(): void
    {
        $service = new TripSortService();

        $this->assertInstanceOf(
            TripSort::class,
            $service
        );
        $busBoardingCard = new BusBoardingCard(
            'Barcelona',
            'Gerona Airport',
            'shuttle',
            null
        );
        $this->assertInstanceOf(
            AbstractCard::class,
            $busBoardingCard
        );
        $flightBoardingCard = new FlightBoardingCard(
            'Gerona Airport',
            'Stockholm',
            'SK455',
            '3A',
            '45B',
            '344'
        );
        $this->assertInstanceOf(
            AbstractCard::class,
            $flightBoardingCard
        );
        $trainBoardingCard = new TrainBoardingCard(
            'Madrid',
            'Barcelona',
            '78A',
            '45B'
        );
        $this->assertInstanceOf(
            AbstractCard::class,
            $trainBoardingCard
        );
    }

    public function testCorrectSort(): void
    {
        $service = new TripSortService();

        $busBoardingCard = new BusBoardingCard(
            'Barcelona',
            'Gerona Airport',
            'shuttle',
            null
        );
        $flightBoardingCard = new FlightBoardingCard(
            'Gerona Airport',
            'Stockholm',
            'SK455',
            '3A',
            '45B',
            '344'
        );
        $trainBoardingCard = new TrainBoardingCard(
            'Madrid',
            'Barcelona',
            '78A',
            '45B'
        );

        /**
         * @var AbstractCard[] $trip
         */
        $trip = $service->sort([
            $busBoardingCard,
            $trainBoardingCard,
            $flightBoardingCard
        ]);

        foreach ($trip as $card) {
            $cardDeparture = $card->getDeparture();
            $cardArrival = $card->getArrival();
            if (isset($leg)) {
                $this->assertEquals($leg, $cardDeparture);
            }
            $leg = $cardArrival;
        }
    }

    public function testFastSortTrip(): void
    {
        $service = new TripSortService();

        $busBoardingCard = new BusBoardingCard(
            'Barcelona',
            'Gerona Airport',
            'shuttle',
            null
        );

        /**
         * @var AbstractCard[] $trip
         */
        $trip = $service->sort([
            $busBoardingCard
        ]);

        $this->assertNotEmpty($trip);
        $this->assertEquals($busBoardingCard, $trip[0]);
    }

    public function testFastSortZeroTrip(): void
    {
        $service = new TripSortService();

        /**
         * @var AbstractCard[] $trip
         */
        $trip = $service->sort([]);

        $this->assertEmpty($trip);
    }
}