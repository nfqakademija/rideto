<?php
// src/Entity/User.php

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", name="work_location")
     */
    protected $workLocation;

    /**
     * @ORM\Column(type="string", name="home_location")
     */
    protected $homeLocation;

    /**
     * @ORM\OneToOne(targetEntity="Workshift")
     */
    protected $workShift;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWorkShift()
    {
        return $this->workShift;
    }

    /**
     * @param mixed $workShift
     * @return User
     */
    public function setWorkShift($workShift)
    {
        $this->workShift = $workShift;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHomeLocation()
    {
        return $this->homeLocation;
    }

    /**
     * @param mixed $homeLocation
     * @return User
     */
    public function setHomeLocation($homeLocation)
    {
        $this->homeLocation = $homeLocation;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWorkLocation()
    {
        return $this->workLocation;
    }

    /**
     * @param mixed $workLocation
     * @return User
     */
    public function setWorkLocation($workLocation)
    {
        $this->workLocation = $workLocation;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWorkShiftId()
    {
        return $this->workShiftId;
    }

    /**
     * @param mixed $workShiftId
     * @return User
     */
    public function setWorkShiftId($workShiftId)
    {
        $this->workShiftId = $workShiftId;
        return $this;
    }




}