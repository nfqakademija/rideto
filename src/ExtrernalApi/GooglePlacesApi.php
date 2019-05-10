<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 06/05/2019
 * Time: 17:03
 */

namespace App\ExtrernalApi;

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
    public function getDistances(string $userLocation, array $userList): array
    {
        $distanceInfo = [];

        $homeDestinationList = $this->joinAllHomeLocations($userList);
        $workDestinationList = $this->joinAllWorkLocations($userList);

        $requesHomeDistanceData = $this->makeRequest($userLocation, $homeDestinationList);
        $requestWorkDistanceData = $this->makeRequest($userLocation, $workDestinationList);

        $this->setStatus($requesHomeDistanceData->status === 'OK' && $requestWorkDistanceData->status === 'OK');

        if ($this->status === true) {
            foreach ($requestHomeDistanceData->rows[0] as $key => $homeDistance ) {
                $distanceInfo[$key]['home_distance_value'] = $homedistance->distance->value;
                $distanceInfo[$key]['home_distance_text'] = $homedistance->distance->text;
            }
            foreach ($requestWorkDistanceData->rows[0] as $key => $workDistance ) {
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
    private function makeRequest(string $originPoint, string $destinationList): array
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
            if ($i = 0) {
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
            if ($i = 0) {
                $request = $user->getRoute()->getWorkLocation();
            }

            $request .= '|place_id:' . $user->getRoute()->getWorkLocation();
            $i++;
        }
        return $request;
    }
}
