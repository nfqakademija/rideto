<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 07/05/2019
 * Time: 21:33
 */

namespace App\Service;


use App\Entity\Matcher;
use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class MatchMaker
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

    public function findMatches(int $id, string $role, int $distanceFromHome, int $distanceFromWork): array
    {
        $matches = [];

        if ($role === 'driver') {
            $matches = $this->matchedClientsInfo($id, $distanceFromHome, $distanceFromWork);
        } elseif ($role === 'client'){
            $matches = $this->matchedDriversInfo($id, $distanceFromHome, $distanceFromWork);
        }

        return $matches;
    }


    public function getMatchedUsers(array $matches): array
    {
        $repository = $this->em->getRepository(User::class);
        $results = [];

        foreach($matches as $id => $info){
            array_push($results,$repository->find($id));
        }

        return $results;
    }


    private function matchedClientsInfo(int $userId, int $distanceFromHome, int $distanceFromWork):array
    {
        $repository = $this->em->getRepository(Matcher::class);
        $matchData = $repository->findAll();

        $matches = [];
        foreach ($matchData as $match) {
            if ($match->getHomeDistance() <= $distanceFromHome && $match->getWorkDistance() <= $distanceFromWork && $match->getDriverId() === $userId) {
                $matches[$match->getClientId()] = ['home_distance' => round($match->getHomeDistance()/1000, 2),
                    'work_distance' => round($match->getWorkDistance()/1000, 2)];
            }
        }
        return $matches;
    }

    private function matchedDriversInfo(int $userId, int $distanceFromHome, int $distanceFromWork):array
    {
        $repository = $this->em->getRepository(Matcher::class);
        $matchData = $repository->findAll();

        $matches = [];
        foreach ($matchData as $match) {
            if ($match->getHomeDistance() <= $distanceFromHome && $match->getWorkDistance() <= $distanceFromWork && $match->getClientId() === $userId) {
                $matches[$match->getDriverId()] = ['home_distance' => round($match->getHomeDistance() / 1000, 2),
                                                   'work_distance' => round($match->getWorkDistance() / 1000, 2)];
            }
        }
        return $matches;
    }
}