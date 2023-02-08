<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity]
#[Vich\Uploadable]
#[ORM\Entity(repositoryClass: ImageRepository::class)]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Vich\UploadableField(mapping: 'image', fileNameProperty: 'IndexImageName', size: 'IndexImageSize')]
    private ?File $IndexImageFile = null;

    #[ORM\Column(length: 255)]
    private ?string $IndexImageName = null;

    #[ORM\Column]
    private ?int $IndexImageSize = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setImageFile(?File $IndexImageFile = null): void
    {
        $this->IndexImageFile = $IndexImageFile;
    }

    public function getImageFile(): ?File
    {
        return $this->IndexImageFile;
    }

    public function getIndexImageName(): ?string
    {
        return $this->IndexImageName;
    }

    public function setIndexImageName(string $IndexImageName): self
    {
        $this->IndexImageName = $IndexImageName;

        return $this;
    }

    public function getIndexImageSize(): ?int
    {
        return $this->IndexImageSize;
    }

    public function setIndexImageSize(int $IndexImageSize): self
    {
        $this->IndexImageSize = $IndexImageSize;

        return $this;
    }
}
