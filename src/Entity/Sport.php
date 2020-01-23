<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SportRepository")
 */
class Sport
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
    private $name;


    /**
     * @ORM\Column(type="string", length=20)
     */
    private $color;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Leader")
     */
    private $leaders;


    public function __construct()
    {
        $this->leaders = new ArrayCollection();
        $this->sportLeaders = new ArrayCollection();
    }

    /**
     * Sport constructor.
     * @param $name
     * @param $leaders
     * @param $sameLineSport
     */
    public static function withValues($name, $leaders, $sameLineSport)
    {
        $instance = new self();
        $instance->name = $name;
        $instance->leaders = $leaders;
        $instance->sameLineSport = $sameLineSport;
        return $instance;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function __toString() {
        return $this->name;
    }


    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return Collection|Leader[]
     */
    public function getLeaders(): Collection
    {
        return $this->leaders;
    }

    public function setLeaders(?Collection $leaders)
    {
        $this->leaders = $leaders;
    }

    public function addLeader(Leader $leader): self
    {
        if (!$this->leaders->contains($leader)) {
            $this->leaders[] = $leader;
            $leader->setSport($this);
        }

        return $this;
    }

    public function removeLeader(Leader $leader): self
    {
        if ($this->leaders->contains($leader)) {
            $this->leaders->removeElement($leader);
            // set the owning side to null (unless already changed)
            if ($leader->getSport() === $this) {
                $leader->setSport(null);
            }
        }

        return $this;
    }

}
