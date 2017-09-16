<?php
namespace Rusblaze\TripSort;

use Rusblaze\TripSort\BoardingCard\AbstractCard;

class TripSortService implements TripSort
{
    /**
     * @inheritdoc
     */
    public function sort(array $boardingCards): array
    {
        $tripLength = count($boardingCards);
        /**
         * @var AbstractCard[] $boardingCards
         */
        if ($tripLength < 2) {
            return $boardingCards;
        }
        $trip = [];
        $startingPoint = $boardingCards[0]->getDeparture();
        $tripEnd = $boardingCards[0];
        for ($i = 0; $i < $tripLength; $i++) {
            $trip[$boardingCards[$i]->getDeparture()] = $boardingCards[$i];
            $trip[$boardingCards[$i]->getArrival()] = $trip[$boardingCards[$i]->getArrival()] ?? null;

            if (is_null($trip[$boardingCards[$i]->getArrival()])) {
                $tripEnd = $boardingCards[$i];
            }
            if ($startingPoint == $boardingCards[$i]->getArrival()) {
                $startingPoint = $boardingCards[$i]->getDeparture();
            }
        }

        $point = $trip[$startingPoint];
        while (!is_null($trip[$point->getArrival()])) {
            $tripSorted[] = $point;
            $point = $trip[$point->getArrival()];
        }
        $tripSorted[] = $tripEnd;

        return $tripSorted;
    }
}