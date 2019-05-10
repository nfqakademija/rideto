<?php


namespace App\Service;

use App\Entity\Matcher;
use App\Entity\User;
use App\ExtrernalApi\GooglePlacesApi;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class MatchDataService
{

    /* @var Doctrine\ORM\EntityManagerInterface $em */
    protected $em;

    /**
     * MatchMaker Constructor
     *
     * @param EntityManager $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param User $driver
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function setDistances(User $driver):void
    {
        $placesAPI = new GooglePlacesApi();

        $clients = $this->em->getRepository(User::class)->findBy(['role' => 'client']);

        foreach ($clients as $client) {
            $homeDistance = $placesAPI->getDistanceBetweenPoints(
                $driver->getRoute()->getHomeLocation(),
                $client->getRoute()->getHomeLocation()
            );
            $workDistance = $placesAPI->getDistanceBetweenPoints(
                $driver->getRoute()->getWorkLocation(),
                $client->getRoute()->getWorkLocation()
            );

            $matchingData = new Matcher();
            $matchingData->setDriverId($driver->getId());
            $matchingData->setClientId($client->getId());
            $matchingData->setHomeDistance($homeDistance);
            $matchingData->setWorkDistance($workDistance);

            $this->em->persist($matchingData);

            $this->em->flush();
        }
    }

    public function updateDistances(User $user):void
    {
        //todo
    }
}
