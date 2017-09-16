# propertyfinder.ae test task

## Structure
### src directory
Contains project source files.
- `./Rusplaze` - vendor directory
- `./Rusplaze/TripSort` - library directory
- `./Rusplaze/TripSort/BoardingCard` - contains boarding card hierarchy
- `./Rusplaze/TripSort/BoardingCard/AbstractCard.php` - abstract class for boarding cards. Contains departure and arrival points
- `./Rusplaze/TripSort/BoardingCard/Bus.php` - class for bus boarding cards
- `./Rusplaze/TripSort/BoardingCard/Flight.php` - class for flight boarding cards
- `./Rusplaze/TripSort/BoardingCard/Train.php` - class for train boarding cards
- `./Rusplaze/TripSort/TripSort.php` - contract for all trip sorters implementations
- `./Rusplaze/TripSort/TripSortService.php` - library entry point. Contains implementation of `sort` contract method.

`sort` method has a manifesto
```php
...
interface TripSort {
...
    /**
     * @param AbstractCard[] $boardingCards
     *
     * @return AbstractCard[]
     */
    public function sort(array $boardingCards): array;
...
}
```
So input is fully compatible with output.

### tests directory
Contains unit tests:
- `TripSortTest` - tests for TripSortService class:
  - correct initialization of all classes (could be distributed among several tests)
  - correct sort of boarding cards list
  - correct sort of single entity boarding cards list
  - correct sort of empty boarding cards list
  
## Testing
Testing is implemented with phpunit library included as a `.phar` file.

## Misc
- `src/autoload.php` contains spl_autoload function
- `phpunit.xml` contains config for phpunit library