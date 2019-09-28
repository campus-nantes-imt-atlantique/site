<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContentRepository")
 */
class Content
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
    private $content_key;

    /**
     * @ORM\Column(type="text")
     */
    private $content_fr;

    /**
     * @ORM\Column(type="text")
     */
    private $content_en;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Section", inversedBy="contents")
     */
    private $section;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContentKey(): ?string
    {
        return $this->content_key;
    }

    public function setContentKey(string $content_key): self
    {
        $this->content_key = $content_key;

        return $this;
    }

    public function getContentEn(): ?string
    {
        return $this->content_en;
    }

    public function setContentEn(string $content_en): self
    {
        $this->content_en = $content_en;

        return $this;
    }
    public function getContentFr(): ?string
    {
        return $this->content_fr;
    }

    public function setContentFr(string $content_fr): self
    {
        $this->content_fr = $content_fr;

        return $this;
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
}
