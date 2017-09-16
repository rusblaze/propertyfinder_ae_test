<?php
namespace Rusblaze\TripSort;

use Rusblaze\TripSort\BoardingCard\AbstractCard;

interface TripSort
{
    /**
     * @param AbstractCard[] $boardingCards
     *
     * @return AbstractCard[]
     */
    public function sort(array $boardingCards): array;
}