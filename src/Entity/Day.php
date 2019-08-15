<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DayRepository")
 */
class Day
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name_fr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name_en;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SportPlanning", mappedBy="day")
     */
    private $sportPlannings;

    public function __construct()
    {
        $this->sportPlannings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameFr(): ?string
    {
        return $this->name_fr;
    }

    public function setNameFr(string $name_fr): self
    {
        $this->name_fr = $name_fr;

        return $this;
    }

    public function setName(string $name_fr, string $name_en): self
    {
        $this->name_fr = $name_fr;
        $this->name_en = $name_en;

        return $this;
    }

    public function getNameEn(): ?string
    {
        return $this->name_en;
    }

    public function setNameEn(string $name_en): self
    {
        $this->name_en = $name_en;

        return $this;
    }

    /**
     * @return Collection|SportPlanning[]
     */
    public function getSportPlannings(): Collection
    {
        return $this->sportPlannings;
    }

    public function addSportPlanning(SportPlanning $sportPlanning): self
    {
        if (!$this->sportPlannings->contains($sportPlanning)) {
            $this->sportPlannings[] = $sportPlanning;
            $sportPlanning->setDay($this);
        }

        return $this;
    }

    public function removeSportPlanning(SportPlanning $sportPlanning): self
    {
        if ($this->sportPlannings->contains($sportPlanning)) {
            $this->sportPlannings->removeElement($sportPlanning);
            // set the owning side to null (unless already changed)
            if ($sportPlanning->getDay() === $this) {
                $sportPlanning->setDay(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name_fr;
    }
}
