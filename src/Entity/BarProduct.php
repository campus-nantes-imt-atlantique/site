<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BarProductRepository")
 */
class BarProduct
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description_fr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description_en;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BarProductType")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\Column(type="boolean")
     */
    private $available;

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

    public function getNameEn(): ?string
    {
        return $this->name_en;
    }

    public function setNameEn(string $name_en): self
    {
        $this->name_en = $name_en;

        return $this;
    }
    
    public function getName(string $lang): ?string
    {
        if($lang=='fr'){
            return $this->name_fr;
        }else{
            return $this->name_en;
        }
    }

    public function getDescriptionFr(): ?string
    {
        return $this->description_fr;
    }

    public function setDescriptionFr(?string $description_fr): self
    {
        $this->description_fr = $description_fr;

        return $this;
    }

    public function getDescriptionEn(): ?string
    {
        return $this->description_en;
    }

    public function setDescriptionEn(?string $description_en): self
    {
        $this->description_en = $description_en;

        return $this;
    }
    
    public function getDescription(string $lang): ?string
    {
        if($lang=='fr'){
            return $this->description_fr;
        }else{
            return $this->description_en;
        }
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function getFormatedPrice(): ?string
    {
        return number_format($this->price, 2,',',' ').' €';
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getType(): ?BarProductType
    {
        return $this->type;
    }

    public function setType(?BarProductType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getAvailable(): ?bool
    {
        return $this->available;
    }

    public function setAvailable(bool $available): self
    {
        $this->avaible = $available;

        return $this;
    }
    public function __toString() {
        return $this->name_en;
    }
}
