<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 07/05/2019
 * Time: 21:33
 */

namespace App\Service;

use App\Entity\User;
use App\ExtrernalApi\GooglePlacesApi;
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

    /**
     * @param $user
     * @param int $distanceFromHome
     * @param int $distanceFromWork
     * @return array
     */
    public function findMatches($user, int $distanceFromHome, int $distanceFromWork): array
    {
        if ($user->getRole() === 'driver') {
            $allDistances = $this->allClientsDistances($user);
        } elseif ($user->getRole() === 'client') {
            $allDistances = $this->allDriversDistances($user);
        }

        $matches = $this->filterByDistance($allDistances, $distanceFromHome, $distanceFromWork);
        return $matches;
    }

    /**
     * @param $driver
     * @return array
     */
    private function allClientsDistances($driver)
    {
        $matches = [];
        $placesApi = new GooglePlacesApi();
        $clients  =  $clients = $this->em->getRepository(User::class)->findBy(['role' => 'client']);

        $distanceData = $placesApi->getDistances($driver, $clients);
        foreach ($clients as $key => $client) {
            $matches[$key] = ['id' => $client->getid(),
                              'name' => $client->getName(),
                              'age' => $client->getAge(),
                              'route' => $client->getRouteDescription(),
                              'description' => $client->getDescription(),
                              'work_distance_value' => $distanceData[$key]['work_distance_value'],
                              'work_distance_text' => $distanceData[$key]['work_distance_text'],
                              'home_distance_value' => $distanceData[$key]['home_distance_value'],
                              'home_distance_text' => $distanceData[$key]['home_distance_text']
                            ];
        }
        return $matches;
      }

    /**
     * @param $client
     * @return array
     */
    private function allDriversDistances($client)
    {
        $matches = [];
        $placesApi = new GooglePlacesApi();
        $drivers  = $this->em->getRepository(User::class)->findBy(['role' => 'driver']);

        $distanceData = $placesApi->getDistances($client, $drivers);
        foreach ($drivers as $key => $driver) {
            $matches[$key] = ['id' => $driver->getid(),
                'name' => $driver->getName(),
                'age' => $driver->getAge(),
                'route' => $driver->getRouteDescription(),
                'description' => $driver->getDescription(),
                'work_distance_value' => $distanceData[$key]['work_distance_value'],
                'work_distance_text' => $distanceData[$key]['work_distance_text'],
                'home_distance_value' => $distanceData[$key]['home_distance_value'],
                'home_distance_text' => $distanceData[$key]['home_distance_text']
            ];
        }
        return $matches;
    }

    private function filterByDistance(array $matches, int $distanceFromHome, int $distanceFromWork): array
    {
        $results = [];
        foreach ($matches as $match) {
            if ($match['work_distance_value'] <= $distanceFromWork
                && $match['home_distance_value'] <= $distanceFromHome
            ) {
                array_push($results, $match);
            }
        }
        return $results;
    }
}
