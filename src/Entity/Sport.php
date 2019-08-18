<?php

namespace App\Entity;

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
     * @ORM\Column(type="array")
     */
    private $leaders;

    /**
     * @ORM\OneToOne(targetEntity="Sport")
     * @ORM\JoinColumn(name="sport_id", referencedColumnName="id")
     */
    private $sameLineSport;

    /**
     * @ORM\Column(type="string", length=7)
     */
    private $color;

    /**
     * Sport constructor.
     * @param $name
     * @param $leaders
     * @param $sameLineSport
     */
    public function __construct($name, $leaders, $sameLineSport)
    {
        $this->name = $name;
        $this->leaders = $leaders;
        $this->sameLineSport = $sameLineSport;
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

    public function getLeaders(): ?array
    {
        return $this->leaders;
    }

    public function setLeaders(array $leaders): self
    {
        $this->leaders = $leaders;
        return $this;
    }

    public function __toString() {
        return $this->name;
    }

    public function getSameLineSport()
    {
        return $this->sameLineSport;
    }

    public function setSameLineSport($sameLineSport): void
    {
        $this->sameLineSport = $sameLineSport;
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
}
