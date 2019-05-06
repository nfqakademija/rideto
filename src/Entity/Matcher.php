<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Repository\MatcherRepository")
 */
class Matcher
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $driver_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $client_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $work_distance;

    /**
     * @ORM\Column(type="integer")
     */
    private $home_distance;

    /**
     * Matcher constructor.
     */


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDriverId(): ?int
    {
        return $this->driver_id;
    }

    public function setDriverId(int $driver_id): self
    {
        $this->driver_id = $driver_id;

        return $this;
    }

    public function getClientId(): ?int
    {
        return $this->client_id;
    }

    public function setClientId(int $client_id): self
    {
        $this->client_id = $client_id;

        return $this;
    }

    public function getWorkDistance(): ?int
    {
        return $this->work_distance;
    }

    public function setWorkDistance(int $work_distance): self
    {
        $this->work_distance = $work_distance;

        return $this;
    }

    public function getHomeDistance(): ?int
    {
        return $this->home_distance;
    }

    public function setHomeDistance(int $home_distance): self
    {
        $this->home_distance = $home_distance;

        return $this;
    }

}

