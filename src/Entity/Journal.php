<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JournalRepository")
 * @Vich\Uploadable
 */
class Journal
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", unique=true)
     */
    private $edition;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="pe_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;


    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $pdf;

    /**
     * @Vich\UploadableField(mapping="pe_pdfs", fileNameProperty="pdf")
     * @var File
     */
    private $pdfFile;

    /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEdition(): ?int
    {
        return $this->edition;
    }

    public function setEdition(int $edition): self
    {
        $this->edition = $edition;

        return $this;
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new DateTime('now');
        }
        return $this;
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setPdfFile(File $pdf = null)
    {
        $this->pdfFile = $pdf;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($pdf) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new DateTime('now');
        }
        return $this;
    }

    public function getPdfFile()
    {
        return $this->pdfFile;
    }

    public function setPdf($pdf)
    {
        $this->pdf = $pdf;
        return $this;
    }

    public function getPdf()
    {
        return $this->pdf;
    }

    public function updateDate()
    {
        $this->updatedAt = new DateTime("now");
    }

    public function __toString()
    {
        return strval($this->edition);
    }

}
