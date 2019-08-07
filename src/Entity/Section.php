<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SectionRepository")
 */
class Section
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
     * @ORM\OneToMany(targetEntity="App\Entity\Pole", mappedBy="section")
     */
    private $poles;

    /**
     * Section constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->poles = new ArrayCollection();
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

    /**
     * @return Collection|Pole[]
     */
    public function getPoles(): Collection
    {
        return $this->poles;
    }

    public function addPole(Pole $pole): self
    {
        if (!$this->poles->contains($pole)) {
            $this->poles[] = $pole;
            $pole->setSection($this);
        }

        return $this;
    }

    public function removePole(Pole $pole): self
    {
        if ($this->poles->contains($pole)) {
            $this->poles->removeElement($pole);
            // set the owning side to null (unless already changed)
            if ($pole->getSection() === $this) {
                $pole->setSection(null);
            }
        }

        return $this;
    }
}
