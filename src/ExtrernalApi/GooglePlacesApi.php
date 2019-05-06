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
     * @param string $pointA
     * @param string $pointB
     * @return int
     */
    public function getDistanceBetweenPoints(string $pointA, string $pointB): int
    {
        $requestData = $this->makeRequest($pointA, $pointB);

        $this->setStatus($requestData->status);

        if($this->status === 'OK' || $this->status === 'ZERO_RESULTS'){
            $distance = $requestData->rows[0]->elements[0]->distance->value;
        }

        return $distance;
    }

    /**
     * @param string $pointA
     * @param string $pointB
     * @return mixed
     */
    private function makeRequest(string $pointA, string $pointB)
    {
        $data = file_get_contents($this->baseURL . '&origins=place_id:' . $pointA . '&destinations=place_id:'. $pointB .'&key=' . $this->key);

        return json_decode($data);
    }

}

