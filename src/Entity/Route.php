<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RouteRepository")
 */
class Route
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
    private $user_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $home_location;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $work_location;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="route", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getHomeLocation(): ?string
    {
        return $this->home_location;
    }

    public function setHomeLocation(string $home_location): self
    {
        $this->home_location = $home_location;

        return $this;
    }

    public function getWorkLocation(): ?string
    {
        return $this->work_location;
    }

    public function setWorkLocation(string $work_location): self
    {
        $this->work_location = $work_location;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
