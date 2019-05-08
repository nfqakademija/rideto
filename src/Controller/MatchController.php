<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 06/05/2019
 * Time: 17:05
 */

namespace App\Controller;


use App\Entity\Matcher;
use App\Entity\User;
use App\ExtrernalApi\GooglePlacesApi;
use App\Service\MatchMaker;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MatchController extends Controller
{

    private $placesAPI;

    public function index(MatchMaker $matchMaker)
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class )
            ->find('2');

        //$this->saveMatchingData();
        $matches= $matchMaker->findMatches($user, 100000, 100000);
        $matchedUsers = $matchMaker->getMatchedUsers($matches);

        return $this->render('home/matches.html.twig', ['users' => $matchedUsers, 'matchDetails' => $matches, 'title' => 'Matches']);
    }

    public function saveMatchingData()
    {
        $this->placesAPI = new GooglePlacesApi();
        $entityManager = $this->getDoctrine()->getManager();

        foreach($this->matchData as $driver){
            if($driver['role'] === 'driver'){
                foreach($this->matchData as $client){
                    if($client['role'] === 'client'){
                        $homeDistance = $this->placesAPI->getDistanceBetweenPoints($driver['home_location'],$client['home_location']);
                        $workDistance = $this->placesAPI->getDistanceBetweenPoints($driver['work_location'],$client['work_location']);

                        $data = new Matcher();
                        $data->setDriverId($driver['id']);
                        $data->setClientId($client['id']);
                        $data->setHomeDistance($homeDistance);
                        $data->setWorkDistance($workDistance);

                        $entityManager->persist($data);

                        $entityManager->flush();

                    }
                }
            }
        }

    }


}