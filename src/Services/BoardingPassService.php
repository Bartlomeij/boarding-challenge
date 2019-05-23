<?php

namespace BoardingChallenge\Services;

use BoardingChallenge\Entities\BoardingPass;
use BoardingChallenge\Exceptions\BoardingPassesSortException;

/**
 * Class BoardingPassService
 * @package BoardingChallenge\Services
 */
class BoardingPassService
{
    /**
     * @param BoardingPass[] $boardingPasses
     * @return BoardingPass[]
     * @throws BoardingPassesSortException
     */
    public function sortBoardingPasses(array $boardingPasses): array
    {
        if (!$boardingPass = $this->getFirstBoardingPass($boardingPasses)) {
            throw new BoardingPassesSortException('Cannot define start location');
        }

        $sortedBoardingPasses = [];
        while ($boardingPass) {
            $sortedBoardingPasses[] = $boardingPass;
            $boardingPass = $this->getBoardingPassBySourceLocationName(
                $boardingPass->getDestinationLocation()->getName(),
                $boardingPasses
            );
        }
        return $sortedBoardingPasses;
    }

    /**
     * @param BoardingPass[] $boardingPasses
     * @return BoardingPass|null
     */
    public function getFirstBoardingPass(array $boardingPasses): ?BoardingPass
    {
        foreach ($boardingPasses as $boardingPass) {
            if ($this->getBoardingPassByDestinationLocationName(
                $boardingPass->getSourceLocation()->getName(),
                $boardingPasses
                ) === null
            ) {
                return $boardingPass;
            }
        }
        return null;
    }

    /**
     * @param string $locationName
     * @param BoardingPass[] $boardingPasses
     * @return BoardingPass|null
     */
    public function getBoardingPassBySourceLocationName(string $locationName, array $boardingPasses): ?BoardingPass
    {
        foreach ($boardingPasses as $boardingPass) {
            if ($boardingPass->getSourceLocation()->getName() === $locationName) {
                return $boardingPass;
            }
        }
        return null;
    }

    /**
     * @param string $locationName
     * @param BoardingPass[] $boardingPasses
     * @return BoardingPass|null
     */
    public function getBoardingPassByDestinationLocationName(string $locationName, array $boardingPasses): ?BoardingPass
    {
        foreach ($boardingPasses as $boardingPass) {
            if ($boardingPass->getDestinationLocation()->getName() === $locationName) {
                return $boardingPass;
            }
        }
        return null;
    }
}