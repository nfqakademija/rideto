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

    private $matchData = [['id' => 1,'home_location' => 'EiVQaWzEl27FsyBnYXR2xJcsIEFrYWRlbWlqYSwgTGl0aHVhbmlhIi4qLAoUChIJN3XNir8h50YRtzS026csNBoSFAoSCVEqEHrAIedGEa8GikwJD_YZ', 'work_location' => 'ChIJ5RuEQgEi50YR4OfyAOJqryU', 'role' => 'driver'],
        ['id' => 2,'home_location' => 'EixWaWVueWLEl3MgZ2F0dsSXIDMyLCBSYXVkb25kdmFyaXMsIExpdGh1YW5pYSIwEi4KFAoSCfMldP_nH-dGEfDGQbbnBc6PECAqFAoSCdmiJHroH-dGEV6EXZMM-zVf', 'work_location' => 'ChIJpY59qwgi50YRPYnjmtKlieg', 'role' => 'client'],
        ['id' => 3,'home_location' => 'ChIJAQAkzg8i50YR0FSNJdHs2Vg', 'work_location' => 'ChIJGd-ishwa50YR3_J0NtUhwvY', 'role' => 'client'],
        ['id' => 4,'home_location' => 'EipQdcWheW5vIGdhdHbElyAxMiwgUmF1ZG9uZHZhcmlzLCBMaXRodWFuaWEiMBIuChQKEgmLB9LM9h_nRhHl8a5bG62b-xAMKhQKEglFj18u8R_nRhG_M7AQi0kmYQ', 'work_location' => 'EiVNLiBEYXVrxaFvcyBnYXR2xJcsIEthdW5hcywgTGl0aHVhbmlhIi4qLAoUChIJY8K_qA8i50YR3wFBhRnh6CoSFAoSCUPTZ7FwIudGEbyLN8fg0Uth', 'role' => 'client'],
        ['id' => 5,'home_location' => 'ChIJeYAg7ULm5kYRLUIRZ6uYSm0', 'work_location' => 'ChIJeYAg7ULm5kYRLUIRZ6uYSm0', 'role' => 'client'],
        ['id' => 6,'home_location' => 'Ei1CaXLFvmVsaW8gMjMtaW9zaW9zIGdhdHbElywgS2F1bmFzLCBMaXRodWFuaWEiLiosChQKEglh6GhZixjnRhGDkeCh7swqcBIUChIJQ9NnsXAi50YRvIs3x-DRS2E', 'work_location' => 'EiVFbGVrdHLEl27FsyBnYXR2xJcsIEthdW5hcywgTGl0aHVhbmlhIi4qLAoUChIJTTa9rzgY50YR6pMlzWBJ7OQSFAoSCUPTZ7FwIudGEbyLN8fg0Uth', 'role' => 'client'],
        ['id' => 7,'home_location' => 'EidHYXJsaWF2b3MgcGxlbnRhcyAxMywgS2F1bmFzLCBMaXRodWFuaWEiMBIuChQKEgmhziIYsCPnRhEmlXWSO7PS9xANKhQKEgmv7WutuiPnRhEx4GLDNPxBYw', 'work_location' => 'Ei9TYXZhbm9yacWzIGcuIDEyMywgUmluZ2F1ZGFpLCBLYXVuYXMsIExpdGh1YW5pYQ', 'role' => 'driver'],
        ['id' => 8,'home_location' => 'EiNNYXJ2ZWzEl3MgZ2F0dsSXLCBLYXVuYXMsIExpdGh1YW5pYSIuKiwKFAoSCZdOZOL2IedGEexdndVRsZ2vEhQKEglD02excCLnRhG8izfH4NFLYQ', 'work_location' => 'ChIJC4qwJPcY50YRzK7Z33FdbEU', 'role' => 'client'],
        ['id' => 9,'home_location' => 'ChIJ2YCWpo0i50YRnFqMeTQFo70', 'work_location' => 'ChIJC4qwJPcY50YRzK7Z33FdbEU', 'role' => 'client'],
        ['id' => 10,'home_location' => 'Eh1PYmVsdSBnLiwgR2lyYWl0xJcsIExpdGh1YW5pYSIuKiwKFAoSCQmAkAsPH-dGEQux-PWplg9EEhQKEgnFyDDmGh_nRhFk-zBAoLXvDg', 'work_location' => 'ChIJyzilSw8i50YR6Vfzjt29zl4', 'role' => 'client'],
        ['id' => 11,'home_location' => 'EiRLcmlhdcWhacWzIGdhdHbElywgS2F1bmFzLCBMaXRodWFuaWEiLiosChQKEgkZ8sHSCyLnRhGfSDfh7OcqPxIUChIJQ9NnsXAi50YRvIs3x-DRS2E', 'work_location' => 'EiRKb25hdm9zIGdhdHbElyAxOSwgS2F1bmFzLCBMaXRodWFuaWEiMBIuChQKEgmnDbJACCLnRhE6KifpFq8iqBATKhQKEgm53cJEsBjnRhFWRcKYq57Ceg', 'role' => 'driver']
    ];

    private $placesAPI;

    public function index(MatchMaker $matchMaker)
    {
        //$this->saveMatchingData();
        $matches= $matchMaker->findMatches(11, 'driver', 100000, 100000);
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