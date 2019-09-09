<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BarProductTypeRepository")
 */
class BarProductType
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
     * @ORM\OneToMany(targetEntity="App\Entity\BarProduct", mappedBy="type")
     */
    private $products;

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
    public function __toString() {
        return $this->name_en;
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

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    /**
     * @return Collection|Product[]
     */
    public function getAvailableProducts(): Collection
    {
        $availableProducts=clone $this->products;
        foreach($availableProducts as $product){
            if(!$product->getAvailable()){
                $availableProducts->removeElement($product);
            }
        }
        return $availableProducts;
    }
    
}
