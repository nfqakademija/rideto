<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 06/05/2019
 * Time: 17:03
 */

namespace App\ExtrernalApi;

use App\Entity\User;

class GooglePlacesApi
{
    private $key= 'AIzaSyAX-QC3A7Fn8_T76yNb-3JlyBfkl-NLc34';

    private $status;

    private $baseURL = 'https://maps.googleapis.com/maps/api/distancematrix/json?units=metric';

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @param string $userLocation
     * @param array $userList
     * @return array
     */
    public function getDistances(User $user, array $userList): array
    {
        $distanceInfo = [];

        $homeLocationList = $this->joinAllHomeLocations($userList);
        $workLocationList = $this->joinAllWorkLocations($userList);

        $requestHomeDistanceData = $this->makeRequest($user->getRoute()->getHomeLocation(), $homeLocationList);
        $requestWorkDistanceData = $this->makeRequest($user->getRoute()->getWorkLocation(), $workLocationList);

        $this->setStatus($requestHomeDistanceData->status === 'OK' && $requestWorkDistanceData->status === 'OK');

        if ($this->status === true) {
            foreach ($requestHomeDistanceData->rows[0]->elements as $key => $homeDistance ) {
                $distanceInfo[$key]['home_distance_value'] = $homeDistance->distance->value;
                $distanceInfo[$key]['home_distance_text'] = $homeDistance->distance->text;
            }
            foreach ($requestWorkDistanceData->rows[0]->elements as $key => $workDistance ) {
                $distanceInfo[$key]['work_distance_value'] = $workDistance->distance->value;
                $distanceInfo[$key]['work_distance_text'] = $workDistance->distance->text;
            }

        }
        return $distanceInfo;
    }

    /**
     * @param string $originPoint
     * @param string $destinationList
     * @return array
     */
    private function makeRequest(string $originPoint, string $destinationList)
    {
        $data = file_get_contents($this->baseURL . '&origins=place_id:' . $originPoint
                                                          . '&destinations=place_id:'
                                                          . $destinationList .'&key=' . $this->key);

        return json_decode($data);
    }


    /**
     * @param array $users
     * @return string
     */
    private function joinAllHomeLocations (array $users) :string
    {
        $i = 0;
        $request ='';
        foreach ($users as $user){
            if ($i === 0) {
                $request = $user->getRoute()->getHomeLocation();

            }
            $request .= '|place_id:' . $user->getRoute()->getHomeLocation();
            $i++;

        }
        return $request;
    }

    /**
     * @param array $users
     * @return string
     */
    private function joinAllWorkLocations (array $users) :string
    {
        $i = 0;
        $request ='';
        foreach ($users as $user){
            if ($i === 0) {
                $request = $user->getRoute()->getWorkLocation();
            }
            $request .= '|place_id:' . $user->getRoute()->getWorkLocation();
            $i++;
        }
        return $request;
    }
}
