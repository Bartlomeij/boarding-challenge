<?php

use BoardingChallenge\Entities\Baggage;
use BoardingChallenge\Entities\BoardingPass;
use PHPUnit\Framework\TestCase;
use BoardingChallenge\Services\BoardingPassService;
use BoardingChallenge\Entities\Location;
use BoardingChallenge\Entities\Transport;
use BoardingChallenge\Exceptions\BoardingPassesSortException;

/**
 * Class BoardingPassServiceTest
 */
class BoardingPassServiceTest extends TestCase
{
    /**
     * @var BoardingPassService
     */
    private $boardingPassSrv;

    /**
     * @var BoardingPass[]
     */
    private $boardingPasses = [];

    public function setUp(): void
    {
        $this->boardingPassSrv = new BoardingPassService();

        $this->boardingPasses[] = new BoardingPass(
            new Location\Airport('Stockholm'),
            new Location\Airport('New York JFK'),
            new Transport\Airplane(
                'SK22',
                '22',
                '7B'
            ),
            new Baggage(null, true)
        );

        $this->boardingPasses[] = new BoardingPass(
            new Location\Airport('Gerona Airport'),
            new Location\Airport('Stockholm'),
            new Transport\Airplane(
                'SK455',
                '45B',
                '3A'
            ),
            new Baggage('344')
        );

        $this->boardingPasses[] = new BoardingPass(
            new Location\City('Madrid'),
            new Location\City('Barcelona'),
            new Transport\Train(
                '78A',
                '45B'
            )
        );


        $this->boardingPasses[] = new BoardingPass(
            new Location\City('Barcelona'),
            new Location\Airport('Gerona Airport'),
            new Transport\AirportBus()
        );
    }

    /**
     * @throws BoardingPassesSortException
     */
    public function testSortBoardingPasses(): void
    {
        $sortedBoardingPasses = $this->boardingPassSrv->sortBoardingPasses($this->boardingPasses);
        $this->assertSameSize($this->boardingPasses, $sortedBoardingPasses);
        $this->assertEquals(sizeof($sortedBoardingPasses), 4);
        $this->assertEquals($sortedBoardingPasses[0]->getSourceLocation()->getName(), 'Madrid');
        $this->assertEquals($sortedBoardingPasses[0]->getDestinationLocation()->getName(), 'Barcelona');
        $this->assertEquals($sortedBoardingPasses[1]->getSourceLocation()->getName(), 'Barcelona');
        $this->assertEquals($sortedBoardingPasses[1]->getDestinationLocation()->getName(), 'Gerona Airport');
        $this->assertEquals($sortedBoardingPasses[2]->getSourceLocation()->getName(), 'Gerona Airport');
        $this->assertEquals($sortedBoardingPasses[2]->getDestinationLocation()->getName(), 'Stockholm');
        $this->assertEquals($sortedBoardingPasses[3]->getSourceLocation()->getName(), 'Stockholm');
        $this->assertEquals($sortedBoardingPasses[3]->getDestinationLocation()->getName(), 'New York JFK');
    }

    public function getFirstBoardingPass(): void
    {
        $firstBoardingPass = $this->boardingPassSrv->getFirstBoardingPass($this->boardingPasses);
        $this->assertEquals('Madrid', $firstBoardingPass->getSourceLocation()->getName());
    }

    public function getFirstBoardingPassReturnsNullIfNotFound(): void
    {
        $boardingPasses = [];
        $boardingPasses[] = new BoardingPass(
            new Location\City('Madrid'),
            new Location\City('Barcelona'),
            new Transport\Train(
                '78A',
                '62A'
            )
        );
        $boardingPasses[] = new BoardingPass(
            new Location\City('Barcelona'),
            new Location\City('Madrid'),
            new Transport\Train(
                '78A',
                '45B'
            )
        );

        $firstBoardingPass = $this->boardingPassSrv->getFirstBoardingPass($boardingPasses);
        $this->assertNull($firstBoardingPass);
    }

    public function testGetBoardingPassBySourceLocationName(): void
    {
        $cityName = 'Stockholm';
        $boardingPass = $this->boardingPassSrv->getBoardingPassBySourceLocationName(
            $cityName,
            $this->boardingPasses
        );
        $this->assertEquals($cityName, $boardingPass->getSourceLocation()->getName());
    }

    public function testGetBoardingPassByDestinationLocationName(): void
    {
        $cityName = 'Barcelona';
        $boardingPass = $this->boardingPassSrv->getBoardingPassByDestinationLocationName(
            $cityName,
            $this->boardingPasses
        );
        $this->assertEquals($cityName, $boardingPass->getDestinationLocation()->getName());
    }

    public function testGetBoardingPassBySourceLocationNameReturnsNullIfNotFound(): void
    {
        $cityName = 'Dubai';
        $boardingPass = $this->boardingPassSrv->getBoardingPassBySourceLocationName(
            $cityName,
            $this->boardingPasses
        );
        $this->assertNull($boardingPass);
    }

    public function testGetBoardingPassByDestinationLocationNameReturnsNullIfNotFound(): void
    {
        $cityName = 'Dubai';
        $boardingPass = $this->boardingPassSrv->getBoardingPassByDestinationLocationName(
            $cityName,
            $this->boardingPasses
        );
        $this->assertNull($boardingPass);
    }
}