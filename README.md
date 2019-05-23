Boarding Challange

Boarding Challenge is a small project contains service able to sort boarding passes.

To sort boarding passes you have to pass array of BoardingChallenge\Entities\BoardingPass into sortBoardingPasses() method in service BoardingChallenge\Services\BoardingPassService.

BoardingPass is created by passing into constructor:
- Source location - implementation of BoardingChallenge\Entities\Location\LocationInterface (Airport, City etc.),
- Destination location - as above,
- Transport - implementation of BoardingChallenge\Entities\Transport\TransportInterface (Airplane, Train etc.),
- Baggage (optionally) - object of class BoardingChallenge\Entities\Baggage. To make baggage automatically transferred just pass true as the second argument,

You can easily add new location type implementing LocationInterface, and add new transport type implementing TransportInterface.

Example of usage in index.php file.

Project runs with php version at least 7.2

To init project just run:
`composer install`

To run tests:
`./vendor/bin/phpunit tests`