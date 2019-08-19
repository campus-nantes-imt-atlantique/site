<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 */
class Event
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
     * @ORM\Column(type="text")
     */
    private $description_fr;

    /**
     * @ORM\Column(type="text")
     */
    private $description_en;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Section")
     * @ORM\JoinColumn(nullable=false)
     */
    private $section;

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

    public function setDescriptionFr(string $description_fr): self
    {
        $this->description_fr = $description_fr;

        return $this;
    }

    public function getDescriptionEn(): ?string
    {
        return $this->description_en;
    }

    public function setDescriptionEn(string $description_en): self
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
    
    public function getDayMonth(string $lang): ?string
    {
        if($lang=='fr'){
            $day=date_format($this->date,'w');
            $num=date_format($this->date,'j');
            $month=date_format($this->date,'n');
            return array('Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi')[$day].' '.$num.' '.array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre')[$month-1];
        }else{
            return date_format($this->date,'l jS F');
        }
    }
    
    public function getSchedule(string $lang): ?string
    {
        if($lang=='fr'){
            return date_format($this->date,'G\hi');
        }else{
            return date_format($this->date,'g.i a');
        }
    }

    public function getSection(): ?Section
    {
        return $this->section;
    }

    public function setSection(?Section $section): self
    {
        $this->section = $section;

        return $this;
    }
    public function __toString() {
        return $this->name_en;
    }
}
