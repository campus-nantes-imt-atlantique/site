<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SportPlanningRepository")
 */
class SportPlanning
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="time")
     */
    private $start;

    /**
     * @ORM\Column(type="time")
     */
    private $end;

    /**
     * One SportPlanning has One Sport.
     * @ORM\ManyToOne(targetEntity="Sport")
     * @ORM\JoinColumn(name="sport_id", referencedColumnName="id")
     */
    private $sport;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Day", inversedBy="sportPlannings")
     */
    private $day;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SportLocation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $location;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStart(): ?\DateTimeInterface
    {
        return $this->start;
    }

    public function setStart(\DateTimeInterface $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getEnd(): ?\DateTimeInterface
    {
        return $this->end;
    }

    public function setEnd(\DateTimeInterface $end): self
    {
        $this->end = $end;

        return $this;
    }
    public function getSport()
    {
        return $this->sport;
    }

    public function setSport($sport): void
    {
        $this->sport = $sport;
    }

    public function getDay(): ?Day
    {
        return $this->day;
    }

    public function setDay(?Day $day): self
    {
        $this->day = $day;

        return $this;
    }


    public function getLocation(): ?SportLocation
    {
        return $this->location;
    }

    public function setLocation(?SportLocation $location): self
    {
        $this->location = $location;

        return $this;
    }
}
