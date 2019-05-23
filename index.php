<?php

require_once __DIR__.'/vendor/autoload.php';

use BoardingChallenge\Entities\Baggage;
use BoardingChallenge\Entities\BoardingPass;
use BoardingChallenge\Entities\Location;
use BoardingChallenge\Entities\Transport;
use BoardingChallenge\Services\BoardingPassService;
use BoardingChallenge\Exceptions\BoardingPassesSortException;

$boardingPasses = [];

$boardingPasses[] = new BoardingPass(
    new Location\City('Barcelona'),
    new Location\Airport('Gerona Airport'),
    new Transport\AirportBus()
);

$boardingPasses[] = new BoardingPass(
    new Location\City('Madrid'),
    new Location\City('Barcelona'),
    new Transport\Train(
        '78A',
        '45B'
    )
);

$boardingPasses[] = new BoardingPass(
    new Location\Airport('Stockholm'),
    new Location\Airport('New York JFK'),
    new Transport\Airplane(
        'SK22',
        '22',
        '7B'
    ),
    new Baggage(null, true)
);

$boardingPasses[] = new BoardingPass(
    new Location\Airport('Gerona Airport'),
    new Location\Airport('Stockholm'),
    new Transport\Airplane(
        'SK455',
        '45B',
        '3A'
    ),
    new Baggage('344')
);

$boardingPassSrv = new BoardingPassService();
$boardingPassSrv->sortBoardingPasses($boardingPasses);